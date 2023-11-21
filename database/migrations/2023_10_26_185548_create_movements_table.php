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
        Schema::create('movements', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('typeMovement_id');
            $table->foreign('typeMovement_id')->references('id')->on('type_movements');
            $table->unsignedBigInteger('movementDeatil_id');
            $table->foreign('movementDeatil_id')->references('id')->on('movement_details');
            $table->string('code');
            $table->string('order');
            $table->string('batch');
            $table->string('businessName')->nullable();
            $table->string('observation')->nullable();
            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id')->references('id')->on('locations');
            $table->unsignedBigInteger('origin_id');
            $table->foreign('origin_id')->references('id')->on('origins');
            $table->unsignedBigInteger('finishedProduct_id')->nullable();
            $table->foreign('finishedProduct_id')->references('id')->on('finished_products');
            $table->unsignedBigInteger('assembledProduct_id')->nullable();
            $table->foreign('assembledProduct_id')->references('id')->on('assembled_products');
            $table->string('amount') ->nullable();
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
        Schema::dropIfExists('movements');
    }
};
