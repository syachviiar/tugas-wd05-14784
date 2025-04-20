<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }
    public function dokter()
    {
        return view('dokter.dashboard');
    }
    public function dokterperiksa()
    {
        return view('dokter.periksa');
    }
    public function pasien()
    {
        return view('pasien.dashboard');
    }
    public function pasienperiksa()
    {
        return view('pasien.periksa');
    }
    public function pasienriwayat()
    {
        return view('pasien.riwayat');
    }
}

