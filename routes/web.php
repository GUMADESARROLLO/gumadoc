<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Documents\DocumentosController;

Route::get('/', function () {
    return view('auth.login-v2');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [DocumentosController::class, 'Dashboard'])->name('dashboard');
    Route::get('/new-doc', [DocumentosController::class, 'Detalles'])->name('new-doc');
    Route::get('/list-doc', [DocumentosController::class, 'ListaDocumentos'])->name('list-doc');
    Route::get('/deta-doc', [DocumentosController::class, 'Details'])->name('deta-doc');

    Route::post('/UploadNAS', [DocumentosController::class, 'UploadNAS'])->name('UploadNAS');
});

Route::middleware('auth')->group(function () {
    Route::get('/Users', [UsersController::class, 'list'])->name('users.list');
    Route::post('/UserStore', [UsersController::class, 'store'])->name('users.store');
    Route::post('/UserUpdate/{id}', [UsersController::class, 'update'])->name('users.update');
    Route::delete('/UserDelete/{id}', [UsersController::class, 'destroy'])->name('users.destroy');
    Route::post('/getDepartamento', [UsersController::class, 'getDepartamento'])->name('getDepartamento');

});





require __DIR__.'/auth.php';
