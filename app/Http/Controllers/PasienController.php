<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function dashboard()
    {
        return view('pasien.dashboard');
    }

    public function periksa()
    {
        return view('pasien.periksa');
    }

    public function riwayat()
    {
        return view('pasien.riwayat');
    }
}
