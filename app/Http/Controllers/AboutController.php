<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return view('livewire.about'); // Asegúrate de que la vista exista
    }
}
