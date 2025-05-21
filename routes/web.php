<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('halamanutama');
})->name('home');

Route::get('/halamanutama', function () {
    return view('halamanutama');
})->name('halamanutama');

Route::get('/inputsuratmasuk', function () {
    return view('inputsuratmasuk');
})->name('inputsuratmasuk');

Route::get('/inputsuratkeluar', function () {
    return view('inputsuratkeluar');
})->name('inputsuratkeluar');

Route::get('/tampilsurat', function () {
    return view('tampilsurat');
})->name('tampilsurat');

Route::get('/suratmasuk', function () {
    return view('suratmasuk');
})->name('suratmasuk');

Route::get('/suratkeluar', function () {
    return view('suratkeluar');
})->name('suratkeluar');

Route::get('/tablesuratmasuk', function () {
    return view('tablesuratmasuk');
})->name('tablesuratmasuk');

Route::get('/tablesuratkeluar', function () {
    return view('tablesuratkeluar');
})->name('tablesuratkeluar');

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
