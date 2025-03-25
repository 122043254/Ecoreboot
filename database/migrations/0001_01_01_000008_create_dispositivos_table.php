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
        Schema::create('dispositivos', function (Blueprint $table) {
            $table->id('id_dispositivo');
            $table->unsignedBigInteger('id_donacion');
            $table->string('descripcion', 255)->nullable();
            $table->string('modelo', 100)->nullable();
            $table->string('nombre', 100);
            $table->timestamps();

            $table->foreign('id_donacion')->references('id_donacion')->on('donaciones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dispositivos');
    }
};
