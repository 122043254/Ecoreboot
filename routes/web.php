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

require __DIR__ . '/auth.php';
