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
        Schema::create('assembled_products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('SemifinishedProduct_id');
            $table->foreign('SemifinishedProduct_id')->references('id')->on('semi_finished_products');
            $table->string('amount');
            $table->string('Observation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assembled_products');
    }
};
