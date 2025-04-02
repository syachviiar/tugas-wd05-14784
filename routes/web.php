<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Auth routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');

// Dashboard umum
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Dokter routes
Route::prefix('dokter')->group(function () {
    Route::get('/dashboard', [DokterController::class, 'dashboard'])->name('dokter.dashboard');
    Route::get('/obat', [DokterController::class, 'obat'])->name('dokter.obat');
    Route::get('/periksa', [DokterController::class, 'periksa'])->name('dokter.periksa');
});

// Pasien routes
Route::prefix('pasien')->group(function () {
    Route::get('/dashboard', [PasienController::class, 'dashboard'])->name('pasien.dashboard');
    Route::get('/periksa', [PasienController::class, 'periksa'])->name('pasien.periksa');
    Route::get('/riwayat', [PasienController::class, 'riwayat'])->name('pasien.riwayat');
});