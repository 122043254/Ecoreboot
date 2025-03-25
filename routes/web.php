<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\About; 

Route::get('/', function () {
    return view('welcome');
})->name('home');

//Route::view('/about', 'about')->name('about');
Route::get('/about', About::class)->name('about');

Route::view('/privacy', 'privacy')->name('privacy');
Route::view('/terms', 'terms')->name('terms');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::view('profile', 'profile')->name('profile');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', \App\Livewire\Admin\Dashboard::class)->name('admin.dashboard');
});

require __DIR__ . '/auth.php';
