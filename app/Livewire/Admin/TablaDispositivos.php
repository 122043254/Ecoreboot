<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Dispositivo;

class TablaDispositivos extends Component
{
    protected $listeners = ['donacionEliminada' => '$refresh'];

    public function render()
    {
        $dispositivos = Dispositivo::all();

        return view('livewire.admin.tabla-dispositivos', [
            'dispositivos' => $dispositivos,
            'totalDispositivos' => $dispositivos->count()
        ]);
    }
}
