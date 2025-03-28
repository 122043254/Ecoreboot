<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Donacion extends Model
{
    protected $table = 'donaciones'; // Nombre de la tabla

    protected $primaryKey = 'id_donacion'; // Clave primaria

    public $incrementing = true; // Indica que la clave primaria es autoincremental

    protected $fillable = [
        'nombre',
        'email',
        'telefono',
        'direccion',
        'tipo_dispositivo',
        'descripcion',
        'estado',
        'fecha_solicitud'
    ];

    public $timestamps = true; // Indica que se deben manejar los timestamps (created_at y updated_at)

    // Relaciones
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function tipoElectrodomestico(): BelongsTo
    {
        return $this->belongsTo(TipoElectrodomestico::class, 'id_tipo_electrodomestico');
    }

    public function estadoDispositivo(): BelongsTo
    {
        return $this->belongsTo(EstadoDispositivo::class, 'id_estado_dispositivo');
    }
}
