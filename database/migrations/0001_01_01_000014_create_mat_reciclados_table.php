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
        Schema::create('mat_reciclados', function (Blueprint $table) {
            $table->id('id_mat_reciclados');
            $table->foreignId('id_reciclaje')->nullable()->constrained('reciclajes', 'id_reciclaje')->nullOnDelete();            
            $table->string('nombre', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mat_reciclados');
    }
};
