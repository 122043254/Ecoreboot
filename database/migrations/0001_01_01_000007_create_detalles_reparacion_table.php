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
        Schema::create('detalles_reparacion', function (Blueprint $table) {
            $table->id('id_detalles_reparacion');
            $table->string('descripcion', 255)->nullable();
            $table->unsignedBigInteger('id_piezas_nuevas')->nullable(); // Foreign key constraint temporarily removed, will be added in a later migration
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles_reparacion');
    }
};
