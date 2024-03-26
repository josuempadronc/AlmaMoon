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
        Schema::create('assembly_structures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('name_input');
            $table->foreign('name_input')->references('id')->on('assembly_inputs');
            $table->unsignedBigInteger('color_input');
            $table->foreign('color_input')->references('id')->on('assembly_inputs');
            $table->unsignedBigInteger('accessory_id');
            $table->foreign('accessory_id')->references('id')->on('assembly_accessories');
            $table->string('amount') ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assembly_structure');
    }
};
