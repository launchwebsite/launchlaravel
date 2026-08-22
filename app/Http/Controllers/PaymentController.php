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
            return redirect()->route('vendor.dashboard')->with('error', 'Product not found.');
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

        // If total is 0 (Free Standard Package), just activate
        if ($total == 0) {
            $product->update(['status' => 'active']);
            return redirect()->route('vendor.postlist')->with('success', 'Product published successfully (Free Package).');
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

        // Call the service to create a session
        $sessionResult = $this->geideaService->createSession($total, $currency, $merchantReferenceId, $callbackUrl);

        if (!$sessionResult['success']) {
            return back()->with('error', 'Failed to initialize payment gateway. Please try again later.');
        }

        $payment->update([
            'geidea_session_id' => $sessionResult['session_id'],
        ]);

        // Load the view that injects the Geidea Javascript SDK to render the Hosted Payment Page
        return view('vendor.payment.checkout', [
            'sessionId' => $sessionResult['session_id'],
            'callbackUrl' => $callbackUrl,
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
            return redirect()->route('vendor.dashboard')->with('error', 'Invalid payment response.');
        }

        DB::beginTransaction();
        
        try {
            // Lock the payment row to prevent duplicate callbacks (Idempotency)
            $payment = Payment::where('merchant_reference_id', $merchantReferenceId)
                ->lockForUpdate()
                ->first();

            if (!$payment) {
                DB::rollBack();
                return redirect()->route('vendor.dashboard')->with('error', 'Payment record not found.');
            }

            // If already processed, just redirect to success
            if ($payment->status === 'success') {
                DB::rollBack();
                return redirect()->route('vendor.postlist')->with('success', 'Payment successful. Product activated.');
            }

            // We must verify the status based on Geidea's payload
            // Geidea typically sends a parameter like `responseCode` (e.g. "000" for success) or `status` ("Success")
            // Let's check typical Geidea callback parameters
            $responseCode = $request->input('responseCode');
            $status = $request->input('status');
            
            // To be secure, log the response but do not log sensitive data
            Log::info('Geidea Callback Received', [
                'merchantReferenceId' => $merchantReferenceId,
                'responseCode' => $responseCode,
                'status' => $status
            ]);

            $isSuccess = ($responseCode === '000' || strtolower($status) === 'success');

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
                return redirect()->route('vendor.postlist')->with('success', 'Payment successful. Product is now active.');
            } else {
                $payment->update([
                    'status' => 'failed',
                    'raw_response' => $request->all(),
                ]);

                DB::commit();
                return redirect()->route('vendor.dashboard')->with('error', 'Payment failed or was cancelled. Please try again.');
            }

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Geidea Callback Error', ['error' => $e->getMessage()]);
            return redirect()->route('vendor.dashboard')->with('error', 'An error occurred while processing the payment.');
        }
    }
}
