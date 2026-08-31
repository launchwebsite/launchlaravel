<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$publicKey = '2258188d-9b2e-4bbf-817a-bd74a85e0c9c';
$apiPassword = 'e8374eaa-a151-47a6-b967-99dc482ecaaf';
$baseUrl = 'https://api.geidea.ae';
$endpoint = $baseUrl . '/payment-intent/api/v2/direct/session';

$amounts = [10.50, 10, 1050, "10.50", "10"];
foreach ($amounts as $amt) {
    try {
        $response = Illuminate\Support\Facades\Http::withBasicAuth($publicKey, $apiPassword)->withoutVerifying()->post($endpoint, [
            'amount' => $amt,
            'currency' => 'AED',
            'merchantReferenceId' => 'TEST_123_' . time() . rand(1, 100),
            'callbackUrl' => 'https://launchlaravel.test/callback',
            'returnUrl' => 'https://launchlaravel.test/return'
        ]);
        echo "Amt: $amt => Status: " . $response->status() . " Response: " . $response->body() . "\n";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "\n";
    }
}
