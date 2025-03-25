<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\RolUsuario;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rol = RolUsuario::first(); // Asumimos que ya existe un rol en la tabla

        User::create([
            'name' => 'Juan Pérez',
            'email' => 'juan@example.com',
            'password' => bcrypt('password123'),
            'id_rol_usuario' => $rol->id_rol_usuario, // Asigna el rol predeterminado
        ]);
    }
}
