<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\AuthController;
use App\Http\Controllers\BukuController;

// Halaman utama
Route::get('/', function () {
    return redirect()->route('login');
});

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Routes (harus login)
Route::middleware(['auth'])->group(function () {
    Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
    Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
    Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');
    Route::get('/buku/{id}/edit', [BukuController::class, 'edit'])->name('buku.edit');
    Route::put('/buku/{id}', [BukuController::class, 'update'])->name('buku.update')
    Route::delete('/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
};
