<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periksa;
use App\Models\User;
use App\Models\Obat;
use App\Models\DetailPeriksa;
use Illuminate\Support\Facades\Auth;

class PeriksaController extends Controller
{
    // Method untuk pasien melihat riwayat pemeriksaan mereka
    public function riwayatPasien()
    {
        // Mengambil riwayat pemeriksaan berdasarkan pasien yang sedang login dan memuat relasi
        $riwayat = Periksa::where('id_pasien', Auth::id())
            ->with(['pasien', 'dokter', 'detailPeriksa.obat'])  // Memuat relasi pasien, dokter, detailPeriksa, dan obat
            ->get();
        
        return view('pasien.riwayat', compact('riwayat'));
    }

    // Method untuk dokter melihat riwayat pemeriksaan pasien
    public function riwayatDokter()
    {
        // Mengambil riwayat pemeriksaan berdasarkan dokter yang sedang login dan memuat relasi
        $riwayat = Periksa::where('id_dokter', Auth::id())
            ->with(['pasien', 'dokter', 'detailPeriksa.obat'])  // Juga sekalian memuat detailPeriksa dan obat untuk dokter
            ->get();
        
        return view('dokter.riwayat', compact('riwayat'));
    }

    // Untuk pasien mengisi form periksa (POST)
    public function store(Request $request)
    {
        $request->validate([
            'id_dokter' => 'required|exists:users,id',   // Validasi dokter yang dipilih
            'tgl_periksa' => 'required|date',            // Validasi tanggal periksa
            'catatan' => 'required|string',              // Validasi catatan
        ]);

        // Membuat entri baru di tabel periksa
        Periksa::create([
            'id_pasien' => Auth::id(),                // Mengambil ID pasien yang sedang login
            'id_dokter' => $request->id_dokter,      // ID dokter yang dipilih
            'tgl_periksa' => $request->tgl_periksa,  // Tanggal periksa
            'catatan' => $request->catatan,          // Catatan medis
            'biaya_periksa' => 0,                    // Biaya periksa, bisa diubah manual atau otomatis nanti
            'status' => 'menunggu',                  // Status pemeriksaan, default menunggu
        ]);

        // Redirect ke riwayat pasien dengan pesan sukses
        return redirect()->route('pasien.riwayat')->with('success', 'Berhasil daftar periksa.');
    }

    // Untuk dokter melihat form pemeriksaan (GET)
    public function edit($id)
    {
        // Menampilkan data pemeriksaan yang akan diedit oleh dokter
        $periksa = Periksa::findOrFail($id);
        $obats = Obat::all();  // Mengambil semua obat yang tersedia
        return view('dokter.edit_periksa', compact('periksa', 'obats'));
    }

    // Untuk dokter menyimpan hasil pemeriksaan (PUT)
    public function update(Request $request, $id)
    {
        $request->validate([
            'diagnosa' => 'required|string',    // Diagnosa yang diberikan dokter
            'rekomendasi' => 'required|string', // Rekomendasi yang diberikan dokter
            'obat' => 'array',                   // Array of obat ID
        ]);

        // Mengambil data pemeriksaan berdasarkan ID
        $periksa = Periksa::findOrFail($id);

        // Update data pemeriksaan dengan diagnosa, rekomendasi, dan status
        $periksa->update([
            'diagnosa' => $request->diagnosa,
            'rekomendasi' => $request->rekomendasi,
            'status' => 'selesai',  // Update status menjadi selesai setelah pemeriksaan
        ]);

        // Menghapus detail periksa (obat yang sudah ada) yang lama jika ada
        $periksa->detailPeriksa()->delete();

        // Insert detail periksa (obat yang diberikan) jika ada
        if ($request->has('obat')) {
            foreach ($request->obat as $obatId) {
                DetailPeriksa::create([
                    'id_periksa' => $periksa->id,   // ID pemeriksaan
                    'id_obat' => $obatId,           // ID obat yang diberikan
                ]);
            }
        }

        // Redirect ke halaman periksa dokter dengan pesan sukses
        return redirect()->route('dokter.periksa')->with('success', 'Berhasil menyimpan pemeriksaan.');
    }

    public function destroy($id)
    {
        // Cari riwayat pemeriksaan berdasarkan ID
        $periksa = Periksa::findOrFail($id);

        // Hapus detail periksa (obat)
        $periksa->detailPeriksa()->delete();

        // Hapus pemeriksaan itu sendiri
        $periksa->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('pasien.riwayat')->with('success', 'Riwayat pemeriksaan berhasil dihapus.');
    }
}