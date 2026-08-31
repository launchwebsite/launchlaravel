<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$publicKey = '2258188d-9b2e-4bbf-817a-bd74a85e0c9c';
$apiPassword = 'e8374eaa-a151-47a6-b967-99dc482ecaaf';

// Test UAE endpoint
$endpoint = 'https://api.geidea.ae/payment-intent/api/v2/direct/session';
$currencies = ['AED', 'SAR', 'EGP', 'USD'];

foreach ($currencies as $curr) {
    try {
        $response = Illuminate\Support\Facades\Http::withBasicAuth($publicKey, $apiPassword)->withoutVerifying()->post($endpoint, [
            'amount' => 100,
            'currency' => $curr,
            'merchantReferenceId' => 'TEST_' . time() . rand(1, 100),
            'callbackUrl' => 'https://launchlaravel.test/callback',
            'returnUrl' => 'https://launchlaravel.test/return'
        ]);
        echo "Currency $curr => Response: " . $response->body() . "\n";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "\n";
    }
}
