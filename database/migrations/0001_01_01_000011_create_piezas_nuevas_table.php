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
        Schema::create('piezas_nuevas', function (Blueprint $table) {
            $table->id('id_piezas_nuevas');
            $table->unsignedBigInteger('id_reparacion')->nullable();
            $table->foreign('id_reparacion')->references('id_reparacion')->on('reparaciones')->nullOnDelete();
            $table->unsignedBigInteger('id_reciclaje')->nullable();
            $table->foreign('id_reciclaje')->references('id_reciclaje')->on('reciclajes')->nullOnDelete();
            $table->decimal('precio', 10, 2)->nullable();
            $table->string('nombre', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('piezas_nuevas');
    }
};
