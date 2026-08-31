<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$publicKey = '2258188d-9b2e-4bbf-817a-bd74a85e0c9c';
$apiPassword = 'e8374eaa-a151-47a6-b967-99dc482ecaaf';
$baseUrl = 'https://api.merchant.geidea.net';

$endpoints = [
    '/payment-intent/api/v2/direct/session',
    '/payment-intent/api/v1/direct/session',
    '/pgw/api/v2/direct/session',
    '/pgw/api/v1/direct/session',
];

$amounts = [10.50, 10, 1050];

foreach ($endpoints as $ep) {
    echo "Endpoint: $ep\n";
    foreach ($amounts as $amt) {
        $response = Illuminate\Support\Facades\Http::withBasicAuth($publicKey, $apiPassword)->withoutVerifying()->post($baseUrl . $ep, [
            'amount' => $amt,
            'currency' => 'AED',
            'merchantReferenceId' => 'TEST_123_' . time(),
            'callbackUrl' => 'http://localhost/callback'
        ]);
        echo "  Amt: $amt => Status: " . $response->status() . " Response: " . $response->body() . "\n";
    }
}
