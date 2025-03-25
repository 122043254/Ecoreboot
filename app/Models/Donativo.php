<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Donativo extends Model
{
    protected $table = 'donativos'; // Nombre de la tabla

    protected $primaryKey = 'id_donativo'; // Clave primaria

    public $incrementing = true; // Indica que la clave primaria es autoincremental

    protected $fillable = [
        'fecha',            // Fecha del donativo
        'id_institucion',   // ID de la institución asociada
        'id_inventario',    // ID del inventario asociado
    ];

    public $timestamps = true; // Indica que se deben manejar los timestamps (created_at y updated_at)

    // Relación con el modelo Institucion
    public function institucion(): BelongsTo
    {
        return $this->belongsTo(Institucion::class, 'id_institucion');
    }

    // Relación con el modelo Inventario
    public function inventario(): BelongsTo
    {
        return $this->belongsTo(Inventario::class, 'id_inventario');
    }
}
