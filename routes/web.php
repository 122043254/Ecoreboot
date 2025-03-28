<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\About as LivewireAbout;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DonationRequestController;


// Ruta principal
Route::view('/', 'welcome')->name('home');

// Rutas de información estática
//Route::view('/about', LivewireAbout::class)->name('about');
Route::view('/about', 'livewire.about')->name('about');
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

// // Rutas para donaciones de dispositivos
// Route::get('/donar-dispositivos', [DonationRequestController::class, 'create'])->name('donar.dispositivos');
// Route::post('/donar-dispositivos', [DonationRequestController::class, 'store'])->name('donar.dispositivos.store');
Route::get('/donar-dispositivos', [DonationRequestController::class, 'create'])->name('donar.dispositivos')->defaults('type', 'donar');
Route::post('/donar-dispositivos', [DonationRequestController::class, 'store'])->name('donar.dispositivos.store');

//Ruta de donativos
Route::get('/solicitar_donativo', [DonationRequestController::class, 'create'])->name('solicitar_donativo')->defaults('type', 'solicitar');
Route::post('/solicitar_donativo', [DonationRequestController::class, 'store'])->name('solicitar_donativo.store');
