<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$p = App\Models\Payment::find(96);
if ($p) {
    $p->status = 'success';
    $p->raw_response = ['test' => '123'];
    echo 'Save: ' . ($p->save() ? 'yes' : 'no') . "\n";
} else {
    echo "Payment 96 not found\n";
}
