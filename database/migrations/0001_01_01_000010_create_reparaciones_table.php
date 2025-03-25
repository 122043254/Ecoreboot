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
        Schema::create('reparaciones', function (Blueprint $table) {
            $table->id('id_reparacion');
            $table->date('fecha')->nullable();
            $table->unsignedBigInteger('id_dispositivo')->nullable();
            $table->foreign('id_dispositivo')->references('id_dispositivo')->on('dispositivos')->nullOnDelete();
            $table->string('descripcion', 255)->nullable();
            $table->decimal('costo', 10, 2)->nullable();
            $table->unsignedBigInteger('id_detalles_reparacion')->nullable();
            $table->foreign('id_detalles_reparacion')->references('id_detalles_reparacion')->on('detalles_reparacion')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reparaciones');
    }
};
