<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reciclaje extends Model
{
    protected $table = 'reciclajes'; // Nombre de la tabla

    protected $primaryKey = 'id_reciclaje'; // Clave primaria

    public $incrementing = true; // Indica que la clave primaria es autoincremental

    protected $fillable = [
        'fecha',           // Fecha del reciclaje
        'id_dispositivo',  // ID del dispositivo asociado
        'descripcion',     // Descripción del reciclaje
    ];

    public $timestamps = true; // Indica que se deben manejar los timestamps (created_at y updated_at)

    // Relación con el modelo Dispositivo
    public function dispositivo(): BelongsTo
    {
        return $this->belongsTo(Dispositivo::class, 'id_dispositivo');
    }
}
