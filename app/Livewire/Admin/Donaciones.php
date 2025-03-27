<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Donacion;

class Donaciones extends Component
{
    public $donacionEditar;
    public $fecha;
    public $total_dispositivos;
    public $activo;

    public function render() {
        $donaciones = Donacion::with('usuario')->latest()->get();

        return view('livewire.admin.donaciones', [
            'donaciones' => $donaciones
        ]);
    }

    protected $listeners = ['eliminarDonacionConfirmada' => 'eliminarDonacion'];

    public function eliminarDonacion($id)
    {
        $donacion = Donacion::find($id);
    
        if ($donacion) {
            $donacion->delete();
    
            $this->dispatch('donacionEliminada');
            session()->flash('mensaje', 'Donación eliminada correctamente.');
        } else {
            session()->flash('error', 'No se encontró la donación.');
        }
    }

    public function editarDonacion($id)
    {
        $this->donacionEditar = Donacion::find($id);

        if ($this->donacionEditar) {
            $this->fecha = $this->donacionEditar->fecha;
            $this->total_dispositivos = $this->donacionEditar->total_dispositivos;
            $this->activo = (bool) $this->donacionEditar->activo;

            // Disparar modal desde JS
            $this->dispatch('abrir-modal-edicion');
        }
    }
     
    public function actualizarDonacion()
    {
        if ($this->donacionEditar) {
            $this->donacionEditar->update([
                'fecha' => $this->fecha,
                'total_dispositivos' => $this->total_dispositivos,
                'activo' => $this->activo
            ]);
    
            $this->reset('donacionEditar', 'fecha', 'total_dispositivos', 'activo');
            $this->dispatch('cerrar-modal-edicion');
            $this->dispatch('notificar-edicion');
        }
    }

}
