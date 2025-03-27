<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dispositivo extends Model
{
    protected $table = 'dispositivos'; // Nombre de la tabla
    protected $primaryKey = 'id_dispositivo'; // Clave primaria
    public $timestamps = true; // Indica que se deben manejar los timestamps (created_at y updated_at)


    public $incrementing = true; // Indica que la clave primaria es autoincremental

    protected $fillable = [
        'id_donacion',  // ID de la donación asociada
        'descripcion',   // Campos que se pueden llenar masivamente
        'modelo',        // Campo opcional
        'nombre',        // Nombre del dispositivo
    ];


    // Relación con el modelo Donacion
    public function donacion(): BelongsTo
    {
        return $this->belongsTo(Donacion::class, 'id_donacion');
    }
}
