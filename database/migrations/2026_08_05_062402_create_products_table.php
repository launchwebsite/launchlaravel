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
        Schema::create('products', function (Blueprint $table) {
            $table->id('PR_Id');
            $table->unsignedBigInteger('CT_Id');
            $table->unsignedBigInteger('SC_Id');
            $table->json('PR_Details');
            $table->timestamps();
            $table->foreign('CT_Id')
                ->references('CT_Id')
                ->on('categories')
                ->onDelete('cascade');
            $table->foreign('SC_Id')
                ->references('SC_Id')
                ->on('sub_categories')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
