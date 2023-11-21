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
        Schema::create('raw_material_movements', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('typeMovement_id');
            $table->foreign('typeMovement_id')->references('id')->on('type_movements');
            $table->string('order');
            $table->string('consumption');
            $table->string('businessName');
            $table->unsignedBigInteger('supplier_id');
            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->unsignedBigInteger('rawMaterial');
            $table->foreign('rawMaterial')->references('id')->on('raw_materials');
            $table->string('amount');
            $table->unsignedBigInteger('origin_id');
            $table->foreign('origin_id')->references('id')->on('origins');
            $table->unsignedBigInteger('destination_id');
            $table->foreign('destination_id')->references('id')->on('destinations');
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
        Schema::dropIfExists('raw_material_movements');
    }
};
