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
        Schema::create('product_component', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_sheat_id');
            $table->foreign('product_sheat_id')->references('id')
                    ->on('product_sheat')->onDelete('cascade');
            $table->string('component');
            $table->string('amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_component');
    }
};
