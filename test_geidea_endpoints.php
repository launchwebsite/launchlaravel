<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$publicKey = '2258188d-9b2e-4bbf-817a-bd74a85e0c9c';
$apiPassword = 'e8374eaa-a151-47a6-b967-99dc482ecaaf';

$endpoints = [
    'https://api.geidea.ae/payment-intent/api/v1/direct/session',
    'https://api.geidea.ae/api/v1/direct/session',
    'https://api.merchant.geidea.net/pgw/api/v1/direct/session',
    'https://api.geidea.ae/payment-intent/api/v2/direct/session'
];

foreach ($endpoints as $endpoint) {
    try {
        $response = Illuminate\Support\Facades\Http::withBasicAuth($publicKey, $apiPassword)->withoutVerifying()->post($endpoint, [
            'amount' => 10.50,
            'currency' => 'AED',
            'merchantReferenceId' => 'TEST_' . time(),
            'callbackUrl' => 'https://launchlaravel.test/callback',
        ]);
        echo "Endpoint: $endpoint\n";
        echo "Status: " . $response->status() . "\nResponse: " . $response->body() . "\n\n";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "\n";
    }
}
