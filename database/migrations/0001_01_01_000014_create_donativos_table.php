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
        Schema::create('donativos', function (Blueprint $table) {
            $table->id('id_donativo');
            $table->date('fecha')->nullable();
            $table->foreignId('id_institucion')->constrained('instituciones', 'id_institucion')->onDelete('cascade');
            $table->foreignId('id_inventario')->constrained('inventario', 'id_inventario')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donativos');
    }
};
