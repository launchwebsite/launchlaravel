<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$publicKey = '2258188d-9b2e-4bbf-817a-bd74a85e0c9c';
$apiPassword = 'e8374eaa-a151-47a6-b967-99dc482ecaaf';

$baseUrls = [
    'https://api.merchant.geidea.net',
    'https://api.merchant.geidea.ae',
    'https://api.geidea.ae',
    'https://api.ksamerchant.geidea.net'
];

foreach ($baseUrls as $baseUrl) {
    echo "Base URL: $baseUrl\n";
    $endpoint = $baseUrl . '/payment-intent/api/v2/direct/session';
    
    try {
        $response = Illuminate\Support\Facades\Http::withBasicAuth($publicKey, $apiPassword)->withoutVerifying()->post($endpoint, [
            'amount' => 10.5,
            'currency' => 'AED',
            'merchantReferenceId' => 'TEST_123_' . time(),
            'callbackUrl' => 'http://localhost/callback'
        ]);
        echo "  Status: " . $response->status() . " Response: " . $response->body() . "\n";
    } catch (Exception $e) {
        echo "  Error: " . $e->getMessage() . "\n";
    }
}
