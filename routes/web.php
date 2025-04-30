<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PeriksaController; // Pastikan PeriksaController diimport
use App\Models\Periksa; // Pastikan model Periksa diimport

/* Halaman Awal */
Route::get('/', function () {
    return view('landingpage');
});

/* Login, Register & Logout*/
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/tables', [DashboardController::class, 'tables']);

/* Setelah Login (Dibatasi oleh auth) */
Route::middleware('auth')->group(function () {

    Route::middleware('role:pasien')->group(function () {
        /* --------- Pasien --------- */
        Route::get('/pasien', function () {
            return view('pasien.dashboard');
        })->name('pasien.dashboard');

        Route::get('/pasien/periksa', function () {
            return view('pasien.periksa');
        })->name('pasien.periksa');

        // Riwayat pemeriksaan pasien, mengarah ke PeriksaController@riwayatPasien
        Route::get('/pasien/riwayat', [PeriksaController::class, 'riwayatPasien'])->name('pasien.riwayat');
        Route::post('/pasien/periksa', [PeriksaController::class, 'store'])->name('pasien.periksa.store');
        Route::delete('/periksa/{id}', [PeriksaController::class, 'destroy'])->name('periksa.hapus');
    });

    Route::middleware('role:dokter')->group(function () {
        Route::get('/dokter', function () {
            return view('dokter.dashboard');
        })->middleware('auth')->name('dokter.dashboard');
        
        // Fitur periksa dokter
        Route::get('/dokter/periksa', function () {
            $periksa = Periksa::all();  // Ambil semua data periksa
            return view('dokter.periksa', compact('periksa'));
        })->name('dokter.periksa');        

        // Rute untuk menampilkan halaman edit pemeriksaan dokter
        Route::get('/dokter/periksa/{id}/edit', [PeriksaController::class, 'edit'])->name('dokter.edit_periksa');

        // Rute untuk menyimpan hasil pemeriksaan yang telah diupdate oleh dokter
        Route::put('/dokter/periksa/{id}', [PeriksaController::class, 'update'])->name('dokter.update_periksa');
        
        // CRUD Obat
        Route::get('/dokter/obat', [ObatController::class, 'index'])->name('dokter.obat');
        Route::post('/dokter/obat', [ObatController::class, 'store'])->name('dokter.obat.store');
        Route::get('/dokter/obat/{id}', [ObatController::class, 'edit'])->name('dokter.obat.edit');
        Route::put('/dokter/obat/{id}', [ObatController::class, 'update'])->name('dokter.obat.update');
        Route::delete('/dokter/obat/{id}', [ObatController::class, 'delete'])->name('dokter.obat.delete');
    });

    Route::get('no-access', function () {
        return view('errors.403');
    });
});