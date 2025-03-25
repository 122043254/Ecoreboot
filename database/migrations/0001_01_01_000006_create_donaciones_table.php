<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('donaciones', function (Blueprint $table) {
            $table->id('id_donacion');
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_tipo_electrodomestico');
            $table->unsignedBigInteger('id_estado_dispositivo');
            $table->date('fecha')->nullable();
            $table->string('imperfecciones', 250)->nullable();
            $table->string('telefono', 12)->nullable();
            $table->integer('total_dispositivos')->default(0);
            $table->boolean('activo')->default(true);
            $table->timestamps();

            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_tipo_electrodomestico')->references('id_tipo_electrodomestico')->on('tipo_electrodomestico')->onDelete('cascade');
            $table->foreign('id_estado_dispositivo')->references('id_estado_dispositivo')->on('estado_dispositivo')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donaciones');
    }
};
