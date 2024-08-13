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
        Schema::create('mechanics_consumption', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->unsignedBigInteger('typeMovement_id');
            $table->foreign('typeMovement_id')->references('id')->on('type_movements');
            $table->string('order');
            $table->unsignedBigInteger('rawMaterial_id');
            $table->foreign('rawMaterial_id')->references('id')->on('sewing_raw_materials');
            $table->string('amountRoll');
            $table->string('amountMts');
            $table->string('Product');
            $table->string('amountProduct');
            $table->string('TypeProduct');
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
        Schema::dropIfExists('mechanics_consumption');
    }
};
