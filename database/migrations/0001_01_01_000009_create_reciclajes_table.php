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
        Schema::create('reciclajes', function (Blueprint $table) {
            $table->id('id_reciclaje');
            $table->date('fecha')->nullable();
            $table->unsignedBigInteger('id_dispositivo')->nullable();
            $table->foreign('id_dispositivo')->references('id_dispositivo')->on('dispositivos')->nullOnDelete();
            $table->string('descripcion', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reciclajes');
    }
};
