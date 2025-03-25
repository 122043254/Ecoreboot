<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MatReciclado extends Model
{
    protected $table = 'mat_reciclados'; // Nombre de la tabla

    protected $primaryKey = 'id_mat_reciclados'; // Clave primaria

    public $incrementing = true; // Indica que la clave primaria es autoincremental

    protected $fillable = [
        'id_reciclaje', // ID del reciclaje asociado
        'nombre',       // Nombre del material reciclado
    ];

    public $timestamps = true; // Indica que se deben manejar los timestamps (created_at y updated_at)

    // Relación con el modelo Reciclaje
    public function reciclaje(): BelongsTo
    {
        return $this->belongsTo(Reciclaje::class, 'id_reciclaje');
    }
}
