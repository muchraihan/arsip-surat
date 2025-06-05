<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});
//login admin
Route::get('/halamanutama', function () {
    return view('halamanutama');
})->middleware(['auth', 'verified'])->name('halamanutama');

Route::get('/halamanutama', function () {
    return view('halamanutama');
})->name('halamanutama');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
