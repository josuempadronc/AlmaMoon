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
        Schema::create('windmill_consumption', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('typeMovement_id');
            $table->foreign('typeMovement_id')
                ->references('id')
                ->on('type_movements');
            $table->string('Product');
            $table->string('amount');
            $table->unsignedBigInteger('measures_id');
            $table->foreign('measures_id')->references('id')->on('measures');
            $table->unsignedBigInteger('finishedProduct_id');
            $table->foreign('finishedProduct_id')->references('id')->on('finished_products');
            $table->string('type');
            $table->string('observation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('windmill_consumption');
    }
};
