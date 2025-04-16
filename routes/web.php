<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\RegisterPasienController;
use Illuminate\Support\Facades\Route;

// Landing Page
Route::get('/', function () {
    return view('landing');
})->name('landing');

// Auth routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');

// Dashboard umum
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Dokter routes
Route::prefix('dokter')->group(function () {
    Route::get('/dashboard', [DokterController::class, 'dashboard'])->name('dokter.dashboard');
    Route::get('/periksa', [DokterController::class, 'periksa'])->name('dokter.periksa');

    // CRUD Obat
    Route::resource('obat', ObatController::class)->except(['show']);
});

// Pasien routes
Route::prefix('pasien')->group(function () {
    Route::get('/dashboard', [PasienController::class, 'dashboard'])->name('pasien.dashboard');
    Route::get('/periksa', [PasienController::class, 'periksa'])->name('pasien.periksa');
    Route::get('/riwayat', [PasienController::class, 'riwayat'])->name('pasien.riwayat');

    // CRUD Register Pasien (pakai controller terpisah)
    Route::get('/register', [RegisterPasienController::class, 'index'])->name('pasien.register.index');
    Route::post('/register', [RegisterPasienController::class, 'store'])->name('pasien.register.store');
    Route::get('/register/{id}/edit', [RegisterPasienController::class, 'edit'])->name('pasien.register.edit');
    Route::put('/register/{id}', [RegisterPasienController::class, 'update'])->name('pasien.register.update');
    Route::delete('/register/{id}', [RegisterPasienController::class, 'destroy'])->name('pasien.register.destroy');
});