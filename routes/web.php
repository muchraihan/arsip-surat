<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\SuratMasukController;

Route::get('/surat-masuk/create', [SuratMasukController::class, 'create'])->name('suratmasuk.create');
Route::post('/surat-masuk/create', [SuratMasukController::class, 'store'])->name('suratmasuk.store');

Route::get('/suratmasuk', [SuratMasukController::class, 'index'])->name('suratmasuk.index');
Route::get('/suratmasuk/{id}', [SuratMasukController::class, 'show'])->name('suratmasuk.show');

Route::get('/suratmasuk/{id}/edit', [SuratMasukController::class, 'edit'])->name('suratmasuk.edit');
Route::put('/suratmasuk/{id}', [SuratMasukController::class, 'update'])->name('suratmasuk.update');

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

// Route::get('/suratmasuk2', function () {
//     return view('suratmasuk');
// })->name('suratmasuk');

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
