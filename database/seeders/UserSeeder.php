<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Crear un usuario administrador
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'), // Hashear la contraseña
            'telefono' => '1234567890',
            'role' => 'administrador', // Cambiado a un valor válido
            'id_rol_usuario' => 1, // Asegúrate de que este ID exista en la tabla rol_usuarios
            'email_verified_at' => now(), // Marca el correo como verificado
        ]);

        // Crear un usuario regular
        User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'password' => Hash::make('password123'),
            'telefono' => '0987654321',
            'role' => 'donante', // Cambiado a un valor válido
            'id_rol_usuario' => 2, // Asegúrate de que este ID exista en la tabla rol_usuarios
            'email_verified_at' => now(),
        ]);
    }
}
