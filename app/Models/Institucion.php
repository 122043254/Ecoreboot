<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{
    protected $table = 'instituciones'; // Nombre de la tabla

    protected $primaryKey = 'id_institucion'; // Clave primaria

    public $incrementing = true; // Indica que la clave primaria es autoincremental

    protected $fillable = [
        'nombre',    // Campos que se pueden llenar masivamente
        'telefono',  // Campo opcional
        'cantidad',  // Campo opcional
    ];

    public $timestamps = true; // Indica que se deben manejar los timestamps (created_at y updated_at)
}
