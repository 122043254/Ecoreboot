<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Dispositivo;

class Dashboard extends Component
{
    public $totalDispositivos;

    public function mount()
    {
        $this->totalDispositivos = Dispositivo::count();
    }

    public function render()
    {
        return view('livewire.admin.dashboard', [
            'totalDispositivos' => $this->totalDispositivos
        ]);
    }
}
