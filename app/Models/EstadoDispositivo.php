<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadoDispositivo extends Model
{
    protected $table = 'estado_dispositivo'; // Nombre de la tabla

    protected $primaryKey = 'id_estado_dispositivo'; // Clave primaria

    public $incrementing = true; // Indica que la clave primaria es autoincremental

    protected $fillable = [
        'nombre', // Campos que se pueden llenar masivamente
    ];

    public $timestamps = true; // Indica que se deben manejar los timestamps (created_at y updated_at)
}
