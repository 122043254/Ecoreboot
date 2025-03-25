<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoElectrodomestico extends Model
{
    protected $table = 'tipo_electrodomestico'; // Nombre de la tabla

    protected $primaryKey = 'id_tipo_electrodomestico'; // Clave primaria

    public $incrementing = true; // Indica que la clave primaria es autoincremental

    protected $fillable = [
        'nombre', // Campos que se pueden llenar masivamente
    ];

    public $timestamps = true; // Indica que se deben manejar los timestamps (created_at y updated_at)
}
