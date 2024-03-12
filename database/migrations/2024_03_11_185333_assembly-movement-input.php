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
        Schema::create('assembly_movement_input', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('typeMovement_id');
            $table->foreign('typeMovement_id')
                    ->references('id')
                    ->on('type_movements');
            $table->string('order')->nullable();
            $table->string('note')->nullable();
            $table->unsignedBigInteger('input_id')->nullable();
            $table->foreign('input_id')
                    ->references('id')
                    ->on('assembly_input');
            $table->string('amount') ->nullable();
            $table->unsignedBigInteger('color_id')->nullable();
            $table->foreign('color_id')
                    ->references('id')
                    ->on('colors');
            $table->unsignedBigInteger('origin_id');
            $table->foreign('origin_id')->references('id')->on('origins');
            $table->unsignedBigInteger('movementDeatil_id');
            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id')
                    ->references('id')
                    ->on('locations');
            $table->string('observation')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assembly_movement_input');
    }
};
