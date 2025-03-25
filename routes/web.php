<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\About as LivewireAbout;
use App\Http\Controllers\Auth\LoginController;

// Ruta principal
Route::view('/', 'welcome')->name('home');

// Rutas de información estática
Route::view('/about', LivewireAbout::class)->name('about');
Route::view('/donar', 'donar')->name('donar.informativo');
Route::view('/privacy', 'privacy')->name('privacy');
Route::view('/terms', 'terms')->name('terms');

// Rutas protegidas por autenticación
Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::view('profile', 'profile')->name('profile');

    // Rutas protegidas para administradores
    Route::middleware(['admin'])->group(function () {
        Route::view('/admin/dashboard', 'admin.dashboard')->name('admin.dashboard');
    });
});

// Ruta para cerrar sesión
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Requiere las rutas de autenticación
require __DIR__ . '/auth.php';
