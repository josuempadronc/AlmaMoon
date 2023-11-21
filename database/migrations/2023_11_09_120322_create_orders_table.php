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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('rif');
            $table->unsignedBigInteger('destination_id');
            $table->foreign('destination_id')->references('id')->on('destinations');
            $table->unsignedBigInteger('movementDeatil_id');
            $table->foreign('movementDeatil_id')->references('id')->on('movement_details');
            $table->unsignedBigInteger('finishedProduct_id')->nullable();
            $table->foreign('finishedProduct_id')->references('id')->on('finished_products');
            $table->unsignedBigInteger('assembledProduct_id')->nullable();
            $table->foreign('assembledProduct_id')->references('id')->on('assembled_products');
            $table->string('amount') ->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
