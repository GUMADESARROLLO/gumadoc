<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DocumentosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});



Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DocumentosController::class, 'Dashboard'])->name('dashboard');
    Route::get('/Detalles', [DocumentosController::class, 'Detalles'])->name('Detalles');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
