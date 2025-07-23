<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Pengurus\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/anggota/tambah', [UserController::class, 'create'])->name('anggota.create');
    Route::post('/anggota', [UserController::class, 'store'])->name('anggota.store');
});

require __DIR__.'/auth.php';
