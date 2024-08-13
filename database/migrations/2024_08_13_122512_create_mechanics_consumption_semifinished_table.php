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
        Schema::create('mechanics_consumption_semifinished', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->unsignedBigInteger('typeMovement_id');
            $table->foreign('typeMovement_id')->references('id')->on('type_movements');
            $table->unsignedBigInteger('semiFinished_id');
            $table->foreign('semiFinished_id')->references('id')->on('mechanics_semifinished');
            $table->string('amountRoll');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('mechanics_products');
            $table->string('amountProduct');
            $table->string('observation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mechanics_consumption_semifinished');
    }
};
