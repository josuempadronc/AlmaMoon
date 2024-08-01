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
        Schema::create('_inyecion_consumption_semi_finished', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('typeMovement_id');
            $table->foreign('typeMovement_id')
                ->references('id')
                ->on('type_movements');
            $table->unsignedBigInteger('finishedProduct_id');
            $table->foreign('finishedProduct_id')->references('id')->on('finished_products');
            $table->unsignedBigInteger('color_id');
            $table->foreign('color_id')->references('id')->on('colors');
            $table->string('amount');
            $table->string('productDelivered');
            $table->unsignedBigInteger('paw_id');
            $table->foreign('paw_id')->references('id')->on('paws');
            $table->unsignedBigInteger('destination_id');
            $table->string('amountPaw');
            $table->string('typeProduct');
            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id')->references('id')->on('locations');
            $table->string('observation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_inyecion_consumption_semi_finished');
    }
};
