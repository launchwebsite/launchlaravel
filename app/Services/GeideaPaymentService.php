<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GeideaPaymentService
{
    protected $publicKey;
    protected $apiPassword;
    protected $baseUrl;

    public function __construct()
    {
        $this->publicKey = config('services.geidea.merchant_public_key');
        $this->apiPassword = config('services.geidea.api_password');
        
        // Remove trailing slash if any
        $this->baseUrl = rtrim(config('services.geidea.base_url'), '/');
    }

    /**
     * Create a new Hosted Checkout Session with Geidea
     */
    public function createSession($amount, $currency, $merchantReferenceId, $callbackUrl)
    {
        // Direct API endpoint for creating a session V2
        // Depending on region, it could be /payment-intent/api/v2/direct/session or /api/v2/direct/session
        // Geidea typically uses /api/v2/direct/session or /api/v1/direct/session 
        // We will construct the endpoint. The merchant provides the base URL.
        $endpoint = $this->baseUrl . '/payment-intent/api/v2/direct/session';

        // Check if credentials are set
        if (!$this->publicKey || !$this->apiPassword) {
            if (app()->environment('local')) {
                // Return a dummy session for testing the UI flow
                return [
                    'success' => true,
                    'session_id' => 'TEST_SESSION_' . time(),
                ];
            }

            Log::error('GeideaPaymentService: Missing Geidea credentials.');
            return [
                'success' => false,
                'message' => 'Payment gateway is not configured properly.'
            ];
        }

        try {
            $response = Http::withBasicAuth($this->publicKey, $this->apiPassword)
                ->post($endpoint, [
                    'amount' => $amount,
                    'currency' => $currency,
                    'merchantReferenceId' => $merchantReferenceId,
                    'callbackUrl' => $callbackUrl,
                ]);

            if ($response->successful()) {
                $data = $response->json();
                
                // Assuming Geidea returns the session object with an id
                if (isset($data['session']['id'])) {
                    return [
                        'success' => true,
                        'session_id' => $data['session']['id'],
                    ];
                }
            }
            
            Log::error('GeideaPaymentService createSession failed', [
                'merchantReferenceId' => $merchantReferenceId,
                'status' => $response->status(),
                'response' => $response->json(),
            ]);

            return [
                'success' => false,
                'message' => 'Failed to initialize payment session.',
                'response' => $response->json()
            ];

        } catch (\Exception $e) {
            Log::error('GeideaPaymentService createSession error', [
                'merchantReferenceId' => $merchantReferenceId,
                'error' => $e->getMessage()
            ]);

            return [
                'success' => false,
                'message' => 'An error occurred while connecting to the payment gateway.'
            ];
        }
    }
}
