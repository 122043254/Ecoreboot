<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RolUsuario;


class RolUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Verifica si no existen roles en la base de datos antes de insertarlos
        if (RolUsuario::count() == 0) {
            RolUsuario::create(['nombre' => 'Administrador']);
            RolUsuario::create(['nombre' => 'Donante']);
        }
    }
}
