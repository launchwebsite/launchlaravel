<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$publicKey = 'fake-key';
$apiPassword = 'fake-password';
$baseUrl = 'https://api.geidea.ae';
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
