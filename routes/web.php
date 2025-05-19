<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/halamanutama', function () {
    return view('halamanutama');
})->name('halamanutama');

Route::get('/inputsurat', function () {
    return view('inputsurat');
})->name('inputsurat');

Route::get('/tampilsurat', function () {
    return view('tampilsurat');
})->name('tampilsurat');

Route::get('/lihatsurat', function () {
    return view('lihatsurat');
})->name('lihatsurat');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
