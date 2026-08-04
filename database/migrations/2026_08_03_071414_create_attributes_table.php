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
        Schema::create('attributes', function (Blueprint $table) {
            $table->bigIncrements('AT_Id');      // Custom primary key
            $table->unsignedBigInteger('CT_Id'); // Foreign key to category table
            $table->unsignedBigInteger('SC_Id'); // Foreign key to category table
            $table->string('AT_Inputs');
            $table->text('AT_Structure')->nullable();
            $table->timestamps();
            $table->foreign('CT_Id')->references('CT_Id')->on('categories')->onDelete('cascade');
            $table->foreign('SC_Id')->references('SC_Id')->on('sub_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attributes');
    }
};
