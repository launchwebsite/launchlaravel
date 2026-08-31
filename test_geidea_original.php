<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$publicKey = '2258188d-9b2e-4bbf-817a-bd74a85e0c9c';
$apiPassword = 'e8374eaa-a151-47a6-b967-99dc482ecaaf';
$baseUrl = 'https://api.merchant.geidea.net';
$endpoint = $baseUrl . '/payment-intent/api/v2/direct/session';

try {
    $response = Illuminate\Support\Facades\Http::withBasicAuth($publicKey, $apiPassword)->withoutVerifying()->post($endpoint, [
        'amount' => 100.50,
        'currency' => 'AED',
        'language' => 'EN',
        'merchantReferenceId' => 'TEST_' . time(),
        'callbackUrl' => 'https://launchlaravel.test/callback',
        'returnUrl' => 'https://launchlaravel.test/return'
    ]);
    echo "Status: " . $response->status() . "\nResponse: " . $response->body() . "\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
