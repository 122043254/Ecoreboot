<?php

namespace App\Http\Controllers\Auth; // ← Correcto

use Illuminate\Http\Request;
use App\Livewire\Actions\Logout;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller; // ← Importa el controlador base

class LoginController extends Controller
{
    public function logout(Logout $logout): RedirectResponse
    {
        $logout();
        return redirect('/');
    }
}
