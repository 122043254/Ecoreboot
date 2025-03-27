<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class DonacionDispositivoSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        // Obtener el ID del usuario administrador creado en UserSeeder
        $userId = DB::table('users')->where('email', 'admin@example.com')->value('id');

        // Obtener IDs de tipo de electrodoméstico y estado (o crearlos si no existen)
        $tipoId = DB::table('tipo_electrodomestico')->first()?->id_tipo_electrodomestico
            ?? DB::table('tipo_electrodomestico')->insertGetId([
                'nombre' => 'Laptop',
                'created_at' => $now,
                'updated_at' => $now,
            ]);

        $estadoId = DB::table('estado_dispositivo')->first()?->id_estado_dispositivo
            ?? DB::table('estado_dispositivo')->insertGetId([
                'nombre' => 'Funcional',
                'created_at' => $now,
                'updated_at' => $now,
            ]);

        // Crear 2 donaciones con sus dispositivos
        for ($i = 1; $i <= 2; $i++) {
            $donacionId = DB::table('donaciones')->insertGetId([
                'id_usuario' => $userId,
                'id_tipo_electrodomestico' => $tipoId,
                'id_estado_dispositivo' => $estadoId,
                'fecha' => $now,
                'imperfecciones' => 'Ninguna visible',
                'telefono' => '5551234567',
                'total_dispositivos' => 2,
                'activo' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ]);

            DB::table('dispositivos')->insert([
                [
                    'id_donacion' => $donacionId,
                    'nombre' => 'Laptop Lenovo',
                    'modelo' => 'ThinkPad X1',
                    'descripcion' => 'Ultrabook ligera',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'id_donacion' => $donacionId,
                    'nombre' => 'Tablet Samsung',
                    'modelo' => 'Galaxy Tab A7',
                    'descripcion' => 'Pantalla 10.4"',
                    'created_at' => $now,
                    'updated_at' => $now,
                ]
            ]);
        }
    }
}
