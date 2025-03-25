<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetallesReparacion extends Model
{
    protected $table = 'detalles_reparacion'; // Nombre de la tabla

    protected $primaryKey = 'id_detalles_reparacion'; // Clave primaria

    public $incrementing = true; // Indica que la clave primaria es autoincremental

    protected $fillable = [
        'descripcion',          // Campos que se pueden llenar masivamente
        'id_piezas_nuevas',    // Campo opcional
    ];

    public $timestamps = true; // Indica que se deben manejar los timestamps (created_at y updated_at)

    // Relación con el modelo PiezasNuevas
    public function piezasNuevas(): BelongsTo
    {
        return $this->belongsTo(PiezasNuevas::class, 'id_piezas_nuevas');
    }
}
