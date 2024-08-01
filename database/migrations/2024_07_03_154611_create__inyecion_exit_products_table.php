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
        Schema::create('_inyecion_exit_products', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('typeMovement_id');
            $table->foreign('typeMovement_id')
                ->references('id')
                ->on('type_movements');
            $table->string('order');
            $table->string('note');
            $table->unsignedBigInteger('finishedProduct_id');
            $table->foreign('finishedProduct_id')->references('id')->on('finished_products');
            $table->unsignedBigInteger('color_id');
            $table->foreign('color_id')->references('id')->on('colors');
            $table->unsignedBigInteger('paw_id');
            $table->foreign('paw_id')->references('id')->on('paws');
            $table->string('amount');
            $table->unsignedBigInteger('destination_id');
            $table->foreign('destination_id')->references('id')->on('destinations');
            $table->string('observation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_inyecion_exit_products');
    }
};
