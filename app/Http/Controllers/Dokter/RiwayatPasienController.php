<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\Pasien;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RiwayatPasienController extends Controller
{
    public function index()
    {
        try {
            $dokter = Auth::user()->dokter;
            
            $pasiens = DB::table('pasiens')
                ->select(
                    'pasiens.id',
                    'pasiens.nama',
                    'pasiens.alamat',
                    'pasiens.no_ktp',
                    'pasiens.no_hp',
                    'pasiens.no_rm'
                )
                ->join('daftar_polis', 'pasiens.id', '=', 'daftar_polis.pasien_id')
                ->join('jadwal_periksa', 'daftar_polis.jadwal_id', '=', 'jadwal_periksa.id')
                ->where('jadwal_periksa.dokter_id', $dokter->id)
                ->distinct()
                ->get();
            
            return view('dokter.riwayat_pasien', compact('pasiens'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function detail($id)
    {
        try {
            $dokter = Auth::user()->dokter;
            $pasien = Pasien::findOrFail($id);
            
            $riwayatPeriksa = DB::table('periksa')
                ->join('daftar_polis', 'periksa.daftar_poli_id', '=', 'daftar_polis.id')
                ->join('jadwal_periksa', 'daftar_polis.jadwal_id', '=', 'jadwal_periksa.id')
                ->leftJoin('detail_periksa', 'periksa.id', '=', 'detail_periksa.id_periksa')
                ->leftJoin('obat', 'detail_periksa.id_obat', '=', 'obat.id')
                ->select(
                    'periksa.id',
                    'periksa.tgl_periksa',
                    'periksa.catatan',
                    'daftar_polis.keluhan',
                    DB::raw('GROUP_CONCAT(DISTINCT CONCAT(obat.nama_obat, " (Rp", FORMAT(obat.harga, 0), ")") SEPARATOR ", ") as obat_diberikan'),
                    DB::raw('150000 + COALESCE(SUM(obat.harga), 0) as total_biaya')
                )
                ->where('jadwal_periksa.dokter_id', $dokter->id)
                ->where('daftar_polis.pasien_id', $id)
                ->where('periksa.status', 'Selesai')
                ->groupBy('periksa.id', 'periksa.tgl_periksa', 'periksa.catatan', 'daftar_polis.keluhan')
                ->orderBy('periksa.tgl_periksa', 'desc')
                ->get();

            return view('dokter.detail_riwayat_pasien', compact('pasien', 'riwayatPeriksa'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
} 