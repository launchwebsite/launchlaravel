<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$publicKey = '2258188d-9b2e-4bbf-817a-bd74a85e0c9c';
$apiPassword = 'e8374eaa-a151-47a6-b967-99dc482ecaaf';
$baseUrl = 'https://api.merchant.geidea.net';
$endpoint = $baseUrl . '/payment-intent/api/v1/direct/session';

$response = Illuminate\Support\Facades\Http::withBasicAuth($publicKey, $apiPassword)->withoutVerifying()->post($endpoint, [
    'amount' => 10.5,
    'currency' => 'AED',
    'timestamp' => date('Y-m-d H:i:s'),
    'merchantReferenceId' => 'TEST_123_' . time(),
    'callbackUrl' => 'http://localhost/callback'
]);

echo $response->status() . "\n";
echo $response->body() . "\n";
