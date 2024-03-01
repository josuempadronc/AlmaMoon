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
            $table->unsignedBigInteger('name_id');
            $table->foreign('name_id')->references('id')->on('customers');
            $table->string('rif');
            $table->string('destination');
            $table->unsignedBigInteger('movementDeatil_id');
            $table->foreign('movementDeatil_id')->references('id')->on('movement_details');
            $table->unsignedBigInteger('finishedProduct_id')->nullable();
            $table->foreign('finishedProduct_id')->references('id')->on('finished_products');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id')->references('id')->on('customers');
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
