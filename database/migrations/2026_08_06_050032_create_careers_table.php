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
        Schema::create('careers', function (Blueprint $table) {
            $table->bigIncrements('CR_Id');      // Custom primary key
            $table->unsignedBigInteger('CT_Id'); // Foreign key to category table
            $table->unsignedBigInteger('SC_Id'); // Foreign key to category table
            $table->string('CR_Name');
            $table->text('CR_Location')->nullable();
            $table->text('CR_SalaryRange')->nullable();
            $table->text('CR_Img')->nullable();
            $table->text('CR_Type')->nullable();
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
        Schema::dropIfExists('careers');
    }
};
