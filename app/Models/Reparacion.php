<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reparacion extends Model
{
    protected $table = 'reparaciones'; // Nombre de la tabla

    protected $primaryKey = 'id_reparacion'; // Clave primaria

    public $incrementing = true; // Indica que la clave primaria es autoincremental

    protected $fillable = [
        'fecha',                     // Fecha de la reparación
        'id_dispositivo',            // ID del dispositivo asociado
        'descripcion',               // Descripción de la reparación
        'costo',                     // Costo de la reparación
        'id_detalles_reparacion',    // ID de los detalles de la reparación
    ];

    public $timestamps = true; // Indica que se deben manejar los timestamps (created_at y updated_at)

    // Relación con el modelo Dispositivo
    public function dispositivo(): BelongsTo
    {
        return $this->belongsTo(Dispositivo::class, 'id_dispositivo');
    }

    // Relación con el modelo DetallesReparacion
    public function detallesReparacion(): BelongsTo
    {
        return $this->belongsTo(DetallesReparacion::class, 'id_detalles_reparacion');
    }
}
