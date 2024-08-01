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
        Schema::create('_inyecion_consumption_raws', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('typeMovement_id');
            $table->foreign('typeMovement_id')->references('id')->on('type_movements');
            $table->string('order');
            $table->string('orderProduction');
            $table->string('Maquina');
            $table->unsignedBigInteger('finishedProduct_id');
            $table->foreign('finishedProduct_id')->references('id')->on('finished_products');
            $table->unsignedBigInteger('rawMaterial_id');
            $table->foreign('rawMaterial_id')->references('id')->on('_inyecion_raw_materials');
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
        Schema::dropIfExists('_inyecion_consumption_raws');
    }
};
