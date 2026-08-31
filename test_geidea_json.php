<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$publicKey = '2258188d-9b2e-4bbf-817a-bd74a85e0c9c';
$apiPassword = 'e8374eaa-a151-47a6-b967-99dc482ecaaf';
$baseUrl = 'https://api.geidea.ae';
$endpoint = $baseUrl . '/payment-intent/api/v2/direct/session';

$jsonBody = '{
    "amount": 10.50,
    "currency": "AED",
    "merchantReferenceId": "TEST_' . time() . '",
    "callbackUrl": "https://launchlaravel.test/callback",
    "returnUrl": "https://launchlaravel.test/return"
}';

$ch = curl_init($endpoint);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonBody);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: Basic ' . base64_encode($publicKey . ':' . $apiPassword)
]);

$response = curl_exec($ch);
echo "Status: " . curl_getinfo($ch, CURLINFO_HTTP_CODE) . "\n";
echo "Response: " . $response . "\n";
curl_close($ch);
