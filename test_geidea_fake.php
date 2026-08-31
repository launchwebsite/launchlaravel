<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$publicKey = 'fake-public-key-123';
$apiPassword = 'fake-password-456';
$baseUrl = 'https://api.merchant.geidea.net';
$endpoint = $baseUrl . '/payment-intent/api/v2/direct/session';

try {
    $response = Illuminate\Support\Facades\Http::withBasicAuth($publicKey, $apiPassword)->withoutVerifying()->post($endpoint, [
        'amount' => 10.5,
        'currency' => 'AED',
        'merchantReferenceId' => 'TEST_123_' . time(),
        'callbackUrl' => 'https://launchlaravel.test/callback'
    ]);
    echo "Status: " . $response->status() . "\nResponse: " . $response->body() . "\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
