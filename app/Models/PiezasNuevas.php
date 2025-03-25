<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PiezasNuevas extends Model
{
    protected $table = 'piezas_nuevas'; // Nombre de la tabla

    protected $primaryKey = 'id_piezas_nuevas'; // Clave primaria

    public $incrementing = true; // Indica que la clave primaria es autoincremental

    protected $fillable = [
        'id_reparacion',   // ID de la reparación asociada
        'id_reciclaje',    // ID del reciclaje asociado
        'precio',          // Precio de la pieza nueva
        'nombre',          // Nombre de la pieza nueva
    ];

    public $timestamps = true; // Indica que se deben manejar los timestamps (created_at y updated_at)

    // Relación con el modelo Reparacion
    public function reparacion(): BelongsTo
    {
        return $this->belongsTo(Reparacion::class, 'id_reparacion');
    }

    // Relación con el modelo Reciclaje
    public function reciclaje(): BelongsTo
    {
        return $this->belongsTo(Reciclaje::class, 'id_reciclaje');
    }
}
