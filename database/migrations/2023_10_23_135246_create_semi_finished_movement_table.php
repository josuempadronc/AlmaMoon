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
        Schema::create('semi_finished_movements', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('typeMovement_id');
            $table->foreign('typeMovement_id')->references('id')->on('type_movements');
            $table->string('code');
            $table->string('order');
            $table->string('batch');
            $table->unsignedBigInteger('supplier_id');
            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->unsignedBigInteger('SemifinishedProduct_id');
            $table->foreign('SemifinishedProduct_id')->references('id')->on('semi_finished_products');
            $table->string('amount');
            $table->unsignedBigInteger('measures_id');
            $table->foreign('measures_id')->references('id')->on('measures');
            $table->unsignedBigInteger('origin_id');
            $table->foreign('origin_id')->references('id')->on('origins');
            $table->unsignedBigInteger('destination_id');
            $table->foreign('destination_id')->references('id')->on('destinations');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('semi_finished_movement');
    }
};
