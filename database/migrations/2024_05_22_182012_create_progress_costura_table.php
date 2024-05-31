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
        Schema::create('progress_costura', function (Blueprint $table) {
            $table->id();
            $table->string('Producto');
            $table->string('cantidad');
            $table->string('status');
            $table->string('encargado');
            $table->string('nota');
            $table->date('fecha');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progress_costura');
    }
};
