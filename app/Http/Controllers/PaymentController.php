<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Product;
use App\Services\GeideaPaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    protected $geideaService;

    public function __construct(GeideaPaymentService $geideaService)
    {
        $this->geideaService = $geideaService;
    }

    /**
     * Show the select payment method page after package selection.
     */
    public function selectMethod(Request $request)
    {
        $request->validate([
            'PR_Id' => 'required',
        ]);

        $vendor = Auth::guard('vendor')->user();
        if (!$vendor) {
            return redirect()->route('vendor-login')->with('error', 'Please log in to continue.');
        }

        $product = Product::where('PR_Id', $request->PR_Id)
            ->where('VR_Id', $vendor->VR_Id)
            ->first();

        if (!$product) {
            return redirect()->route('vendor.dashboard')->with('error', 'Product not found or access denied.');
        }

        if ($product->status === 'active') {
            return redirect()->route('vendor.dashboard')->with('error', 'This product is already active.');
        }

        // Calculate expected price securely on the backend
        $subtotal = 0;
        
        // Check for premium package (ID 77)
        if ($request->has('premium_package') && $request->premium_package == 77) {
            $subtotal += 77;
        }

        // Check for feature packages
        if ($request->has('feature_package')) {
            $val = (int)$request->feature_package;
            $allowedFeatures = [10, 30, 50, 99, 199];
            if (in_array($val, $allowedFeatures)) {
                $subtotal += $val;
            }
        }

        $vat = $subtotal * 0.05;
        $total = $subtotal + $vat;

        return view('vendor.payment.select_method', [
            'PR_Id' => $request->PR_Id,
            'premium_package' => $request->premium_package,
            'feature_package' => $request->feature_package,
            'total' => $total,
        ]);
    }

    /**
     * Initiate payment from the package selection page.
     */
    public function initiate(Request $request)
    {
        $request->validate([
            'PR_Id' => 'required|exists:products,PR_Id',
        ]);

        $vendor = Auth::guard('vendor')->user();
        if (!$vendor) {
            return redirect()->route('vendor-login')->with('error', 'Please log in to continue.');
        }

        $product = Product::where('PR_Id', $request->PR_Id)
            ->where('VR_Id', $vendor->VR_Id)
            ->first();

        if (!$product) {
            return back()->with('error', 'Product not found.');
        }


        // Calculate expected price securely on the backend
        $subtotal = 0;
        
        // Check for premium package (ID 77)
        if ($request->has('premium_package') && $request->premium_package == 77) {
            $subtotal += 77;
        }

        // Check for feature packages
        if ($request->has('feature_package')) {
            $val = (int)$request->feature_package;
            $allowedFeatures = [10, 30, 50, 99, 199];
            if (in_array($val, $allowedFeatures)) {
                $subtotal += $val;
            }
        }

        $vat = $subtotal * 0.05;
        $total = $subtotal + $vat;

        // If total is 0, reject it because a paid package is required
        if ($total == 0) {
            return back()->with('error', 'Please select a package to publish your ad.');
        }

        $merchantReferenceId = 'ORDER_' . time() . '_' . $vendor->VR_Id . '_' . $product->PR_Id;
        $currency = 'AED'; // Based on requirements and views

        $payment = Payment::create([
            'VR_Id' => $vendor->VR_Id,
            'PR_Id' => $product->PR_Id,
            'merchant_reference_id' => $merchantReferenceId,
            'amount' => $total,
            'currency' => $currency,
            'status' => 'pending',
        ]);
        $callbackUrl = route('payment.callback');
        $returnUrl = route('payment.callback');

        // Call the service to create a session
        $sessionResult = $this->geideaService->createSession($total, $currency, $merchantReferenceId, $callbackUrl, $returnUrl);

        if (!$sessionResult['success']) {
            return redirect()->route('package.selection', ['PR_Id' => $request->PR_Id])
                             ->with('error', 'Failed to initialize payment gateway. Please check your API keys and try again.');
        }

        $payment->update([
            'geidea_session_id' => $sessionResult['session_id'],
        ]);

        // Load the view that injects the Geidea Javascript SDK to render the Hosted Payment Page
        return view('vendor.payment.checkout', [
            'sessionId' => $sessionResult['session_id'],
            'callbackUrl' => $callbackUrl,
            'prId' => $product->PR_Id,
            'merchantReferenceId' => $merchantReferenceId,
        ]);
    }

    /**
     * Handle Geidea Callback
     */
    public function callback(Request $request)
    {
        // Geidea typically redirects here with response parameters in the query string or body
        // Hosted checkout usually returns merchantReferenceId and status in query or post
        $merchantReferenceId = $request->input('merchantReferenceId');
        
        if (!$merchantReferenceId) {
            return view('vendor.payment.callback_handler', [
                'redirectUrl' => route('vendor.dashboard')
            ]);
        }

        DB::beginTransaction();
        
        try {
            // Lock the payment row to prevent duplicate callbacks (Idempotency)
            $payment = Payment::where('merchant_reference_id', $merchantReferenceId)
                ->lockForUpdate()
                ->first();

            if (!$payment) {
                DB::rollBack();
                return view('vendor.payment.callback_handler', [
                    'redirectUrl' => route('vendor.dashboard')
                ]);
            }

            if ($payment->status === 'success') {
                DB::rollBack();
                session()->flash('success', 'Payment successful. Product activated.');
                return view('vendor.payment.callback_handler', [
                    'redirectUrl' => route('vendor.postlist')
                ]);
            }

            // We must verify the status based on Geidea's payload
            // Geidea typically sends a parameter like `responseCode` (e.g. "000" for success) or `status` ("Success")
            // Let's check typical Geidea callback parameters
            $responseCode = $request->input('responseCode');
            $status = $request->input('status');
            $responseMessage = $request->input('responseMessage');
            $detailedResponseMessage = $request->input('detailedResponseMessage');
            
            // To be secure, log the response but do not log sensitive data
            Log::info('Geidea Callback Received', [
                'merchantReferenceId' => $merchantReferenceId,
                'responseCode' => $responseCode,
                'status' => $status,
                'responseMessage' => $responseMessage,
                'detailedResponseMessage' => $detailedResponseMessage
            ]);

            $isSuccess = false;
            if ($responseCode !== null) {
                $isSuccess = ($responseCode === '000');
            } else {
                $isSuccess = (strtolower($status) === 'success');
            }

            if ($isSuccess) {
                $payment->update([
                    'status' => 'success',
                    'raw_response' => $request->all(),
                    'paid_at' => now(),
                    'geidea_order_id' => $request->input('orderId'),
                ]);

                // Activate the product
                $product = Product::find($payment->PR_Id);
                if ($product) {
                    $product->update(['status' => 'active']);
                }

                DB::commit();

                // Break out of the iframe and show success
                session()->flash('success', 'Payment successful. Product is now active.');
                return view('vendor.payment.callback_handler', [
                    'redirectUrl' => route('vendor.postlist')
                ]);
            } else {
                $isPending = (strtolower($status) === 'pending');
                $dbStatus = $isPending ? 'pending' : 'failed';

                $payment->update([
                    'status' => $dbStatus,
                    'raw_response' => $request->all(),
                ]);

                DB::commit();
                
                if ($isPending) {
                    $message = 'Your payment is pending or in progress. We will notify you once it completes.';
                    if (!empty($detailedResponseMessage) && $detailedResponseMessage !== 'The operation was successful') {
                        $message = $detailedResponseMessage;
                    } elseif (!empty($responseMessage) && $responseMessage !== 'Success') {
                        $message = $responseMessage;
                    }
                    
                    session()->flash('success', $message); // use success flash for non-error
                    return view('vendor.payment.callback_handler', [
                        'redirectUrl' => route('vendor.dashboard')
                    ]);
                } else {
                    $errorMessage = 'Payment failed or was cancelled. Please try again.';
                    if (!empty($detailedResponseMessage) && $detailedResponseMessage !== 'The operation was successful') {
                        $errorMessage = $detailedResponseMessage;
                    } elseif (!empty($responseMessage) && $responseMessage !== 'Success') {
                        $errorMessage = $responseMessage;
                    }
                    
                    session()->flash('error', $errorMessage);
                    return view('vendor.payment.callback_handler', [
                        'redirectUrl' => route('package.selection', ['PR_Id' => $payment->PR_Id])
                    ]);
                }
            }

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Geidea Callback Error', ['error' => $e->getMessage()]);
            // Attempt to redirect to package selection if we have the payment, else dashboard
            $prId = isset($payment) ? $payment->PR_Id : null;
            if ($prId) {
                session()->flash('error', 'An error occurred while processing the payment.');
                return view('vendor.payment.callback_handler', [
                    'redirectUrl' => route('package.selection', ['PR_Id' => $prId])
                ]);
            }
            session()->flash('error', 'An error occurred while processing the payment.');
            return view('vendor.payment.callback_handler', [
                'redirectUrl' => route('vendor.dashboard')
            ]);
        }
    }
}
