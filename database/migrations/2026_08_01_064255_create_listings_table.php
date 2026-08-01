<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id('LS_Id');
            $table->unsignedBigInteger('VR_Id');
            $table->unsignedBigInteger('CT_Id');
            $table->unsignedBigInteger('SC_Id')->nullable();
            $table->string('LS_Title');
            $table->decimal('LS_Price', 10, 2)->nullable();
            $table->string('LS_City')->nullable();
            $table->string('LS_Country')->nullable();
            $table->json('LS_Attributes')->nullable();
            $table->tinyInteger('LS_Status')->default(0);
            $table->timestamps();

            $table->foreign('VR_Id')->references('VR_Id')->on('vendors')->cascadeOnDelete();
            $table->foreign('CT_Id')->references('CT_Id')->on('categories')->cascadeOnDelete();
            $table->foreign('SC_Id')->references('SC_Id')->on('sub_categories')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
