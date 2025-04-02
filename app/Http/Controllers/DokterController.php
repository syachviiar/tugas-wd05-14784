<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function dashboard()
    {
        return view('dokter.dashboard');
    }

    public function obat()
    {
        return view('dokter.obat');
    }

    public function periksa()
    {
        return view('dokter.periksa');
    }
}
