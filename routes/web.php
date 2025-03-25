<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Livewire\About as LivewireAbout;

// Ruta principal
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Rutas de About
Route::get('/about', LivewireAbout::class)->name('about');

Route::view('/donar', 'donar')->name('donar.informativo');

// Rutas de información estática
Route::view('/privacy', 'privacy')->name('privacy');
Route::view('/terms', 'terms')->name('terms');

// Rutas protegidas por autenticación
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
});

// Rutas protegidas para administradores
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

// Requiere las rutas de autenticación
require __DIR__ . '/auth.php';
