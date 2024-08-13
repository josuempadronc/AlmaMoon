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
        Schema::create('sewing_consumption_semifinisheds', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->unsignedBigInteger('typeMovement_id');
            $table->foreign('typeMovement_id')->references('id')->on('type_movements');
            $table->unsignedBigInteger('SemifinishedProduct_id');
            $table->foreign('SemifinishedProduct_id')->references('id')->on('semi_finished_products');
            $table->string('amount');
            $table->string('Product');
            $table->string('amountPro');
            $table->unsignedBigInteger('color_id');
            $table->foreign('color_id')->references('id')->on('colors');
            $table->string('observation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sewing_consumption_semifinisheds');
    }
};
