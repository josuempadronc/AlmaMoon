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
        Schema::create('paint_movements', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->unsignedBigInteger('typeMovement_id');
            $table->foreign('typeMovement_id')
                ->references('id')
                ->on('type_movements');
            $table->string('nota');
            $table->string('order');
            $table->string('Product');
            $table->string('amount');
            $table->unsignedBigInteger('measures_id');
            $table->foreign('measures_id')->references('id')->on('measures');
            $table->unsignedBigInteger('origin_id')->nullable();
            $table->foreign('origin_id')->references('id')->on('origins');
            $table->string('observation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paint_movements');
    }
};