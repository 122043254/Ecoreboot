<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Dispositivo;
use App\Models\User;
use App\Models\Donacion;

class Dashboard extends Component
{
    protected $listeners = ['donacionEliminada' => '$refresh'];

    public function render()
    {
        $dispositivos = Dispositivo::all();
        $usuarios = User::count();
        $donaciones = Donacion::all();
    
        return view('livewire.admin.dashboard', [
            'totalDispositivos' => $dispositivos->count(),
            'dispositivos' => $dispositivos,
            'totalUsuarios' => $usuarios,
            'solicitudesDonativos' => $donaciones
        ]);
    }

    public function actualizarDispositivos() {
        $this->dispositivos = Dispositivo::all();
        $this->totalDispositivos = $this->dispositivos->count();
    }

}
