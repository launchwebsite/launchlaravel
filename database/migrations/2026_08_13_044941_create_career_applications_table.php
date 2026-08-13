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
       Schema::create('career_applications', function (Blueprint $table) {
    $table->id('CA_Id');

    $table->unsignedBigInteger('CR_Id');

    $table->string('CA_Name');
    $table->string('CA_Email');
    $table->string('CA_Phone');
    $table->string('CA_JobType');
    $table->string('CA_Resume')->nullable();

    $table->timestamps();

    $table->foreign('CR_Id')
        ->references('CR_Id')
        ->on('careers')
        ->onDelete('cascade');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('career_applications');
    }
};
