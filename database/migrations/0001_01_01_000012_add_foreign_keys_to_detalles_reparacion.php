<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detalles_reparacion', function (Blueprint $table) {
            $table->foreign('id_piezas_nuevas')
                  ->references('id_piezas_nuevas')
                  ->on('piezas_nuevas')
                  ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detalles_reparacion', function (Blueprint $table) {
            $table->dropForeign(['id_piezas_nuevas']);
        });
    }
};

