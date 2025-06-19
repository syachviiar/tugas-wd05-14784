<?php

namespace App\Http\Controllers;

use App\Models\DaftarPoli;
use App\Models\JadwalPeriksa;
use App\Models\Poli;
use App\Models\Dokter;
use App\Models\Periksa;
use App\Models\DetailPeriksa;
use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class PeriksaController extends Controller
{
    public function index()
    {
        $polis = Poli::all();
        $riwayat = DaftarPoli::where('pasien_id', Auth::user()->pasien->id)
            ->with(['poli', 'jadwal.dokter'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pasien.periksa', compact('polis', 'riwayat'));
    }

    // ✅ AJAX: Ambil dokter berdasarkan poli
    public function getDokterByPoli($poliId)
    {
        try {
            $dokters = Dokter::where('poli_id', $poliId)
                ->with('user:id,name')
                ->get()
                ->map(function ($dokter) {
                    return [
                        'id' => $dokter->id,
                        'name' => $dokter->user->name,
                    ];
                });

            return response()->json($dokters);
        } catch (\Exception $e) {
            Log::error('Error getDokterByPoli: ' . $e->getMessage());
            return response()->json(['error' => 'Gagal mengambil data dokter'], 500);
        }
    }

    // ✅ AJAX: Ambil jadwal berdasarkan dokter
    public function getJadwalByDokter($dokterId)
    {
        try {
            $jadwals = JadwalPeriksa::where('dokter_id', $dokterId)
                ->where('status', 'Aktif')
                ->get(['id', 'hari', 'jam_mulai', 'jam_selesai']);

            return response()->json($jadwals);
        } catch (\Exception $e) {
            Log::error('Error getJadwalByDokter: ' . $e->getMessage());
            return response()->json(['error' => 'Gagal mengambil data jadwal'], 500);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'poli_id' => 'required|exists:polis,id',
            'dokter_id' => 'required|exists:dokters,id',
            'jadwal_id' => 'required|exists:jadwal_periksa,id',
            'keluhan' => 'required|string'
        ]);

        DB::beginTransaction();
        try {
            $antrian = DaftarPoli::where('jadwal_id', $request->jadwal_id)
                ->whereDate('created_at', today())
                ->count() + 1;

            $daftarPoli = DaftarPoli::create([
                'pasien_id' => Auth::user()->pasien->id,
                'poli_id' => $request->poli_id,
                'jadwal_id' => $request->jadwal_id,
                'keluhan' => $request->keluhan,
                'no_antrian' => $antrian,
                'status' => 'Menunggu'
            ]);

            Periksa::create([
                'daftar_poli_id' => $daftarPoli->id,
                'status' => 'Menunggu'
            ]);

            DB::commit();
            return redirect()->route('pasien.periksa')
                ->with('success', 'Berhasil mendaftar poli. Nomor antrian Anda: ' . $antrian);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error dalam store: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function batal($id)
    {
        DB::beginTransaction();
        try {
            $daftar = DaftarPoli::where('id', $id)
                ->where('pasien_id', Auth::user()->pasien->id)
                ->where('status', 'Menunggu')
                ->firstOrFail();

            $daftar->update(['status' => 'Batal']);
            $daftar->periksa->update(['status' => 'Batal']);

            DB::commit();
            return redirect()->route('pasien.periksa')
                ->with('success', 'Pendaftaran berhasil dibatalkan');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error dalam batal: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tgl_periksa' => 'required|date',
            'catatan' => 'required|string',
            'status' => 'required|in:Menunggu,Selesai,Batal',
            'obat_id' => 'required|array|min:1',
            'obat_id.*' => 'exists:obat,id',
        ]);

        DB::beginTransaction();
        try {
            $periksa = Periksa::findOrFail($id);

            $periksa->update([
                'tgl_periksa' => $request->tgl_periksa,
                'catatan' => $request->catatan,
                'status' => $request->status,
            ]);

            // Hapus detail lama
            $periksa->detailPeriksa()->delete();

            // Tambah ulang detail
            foreach ($request->obat_id as $obatId) {
                $periksa->detailPeriksa()->create([
                    'id_obat' => $obatId
                ]);
            }

            // Biaya tetap
            $periksa->update(['biaya_periksa' => 150000]);

            DB::commit();
            return redirect()->route('dokter.jadwal-periksa.index')
                ->with('success', 'Pemeriksaan berhasil diperbarui!');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Gagal update periksa: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal memperbarui pemeriksaan: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $periksa = Periksa::with([
            'daftarPoli.pasien',
            'daftarPoli.jadwal.dokter.user',
            'detailPeriksa.obat'
        ])->findOrFail($id);        

        return view('pasien.periksa.show', compact('periksa'));
    }
}
