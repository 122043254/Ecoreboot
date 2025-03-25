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
            $table->foreignId('id_institucion')->nullable()->references('id_institucion')->on('instituciones')->nullOnDelete();
            $table->foreignId('id_inventario')->nullable()->references('id_inventario')->on('inventario')->nullOnDelete();
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
