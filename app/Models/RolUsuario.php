<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolUsuario extends Model
{
    protected $table = 'rol_usuarios'; // Nombre de la tabla

    protected $primaryKey = 'id_rol_usuario'; // Clave primaria

    public $incrementing = true; // Indica que la clave primaria es autoincremental

    protected $fillable = [
        'nombre', // Campos que se pueden llenar masivamente
    ];

    public $timestamps = true; // Indica que se deben manejar los timestamps (created_at y updated_at)
}
