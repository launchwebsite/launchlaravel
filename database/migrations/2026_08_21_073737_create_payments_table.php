<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('VR_Id')->nullable();
            $table->unsignedBigInteger('PR_Id')->nullable();
            $table->string('merchant_reference_id')->unique();
            $table->string('geidea_session_id')->nullable();
            $table->string('geidea_order_id')->nullable()->unique();
            $table->decimal('amount', 10, 2);
            $table->string('currency', 10)->default('AED');
            $table->string('status')->default('pending'); // pending, success, failed, cancelled
            $table->text('raw_response')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
