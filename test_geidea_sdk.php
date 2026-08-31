<?php
$urls = [
    'https://payments.geidea.ae/hpp/geideaCheckout.min.js',
    'https://payments.geidea.net/hpp/geideaCheckout.min.js',
    'https://hpp.geidea.ae/hpp/geideaCheckout.min.js',
    'https://hpp.geidea.net/hpp/geideaCheckout.min.js',
];

foreach ($urls as $url) {
    echo "Testing $url\n";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        echo "Error: " . curl_error($ch) . "\n";
    } else {
        echo "HTTP Code: " . curl_getinfo($ch, CURLINFO_HTTP_CODE) . "\n";
    }
    curl_close($ch);
    echo "--------------------------\n";
}
