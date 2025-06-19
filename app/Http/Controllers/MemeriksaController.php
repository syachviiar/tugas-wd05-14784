<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periksa;
use App\Models\User;
use App\Models\Obat;
use App\Models\DaftarPoli;
use App\Models\DetailPeriksa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MemeriksaController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $dokter = $user->dokter;
        
        $periksas = Periksa::whereHas('daftarPoli.jadwal', function($query) use ($dokter) {
            $query->where('dokter_id', $dokter->id);
        })->with([
            'daftarPoli.pasien',
            'daftarPoli.jadwal.dokter',
            'detailPeriksa.obat'
        ])->get();        
        
        return view('dokter.memeriksa', compact('periksas'));
    }

    public function create()
    {
        return view('dokter.memeriksa.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('dokter.memeriksa')->with('success', 'Pemeriksaan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $periksa = Periksa::with(['detailPeriksa.obat', 'daftarPoli.pasien'])->findOrFail($id);
        $obats = Obat::select('id', 'nama_obat', 'harga')->get();

        return view('dokter.editperiksa', compact('periksa', 'obats'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'tgl_periksa' => 'required|date',
            'catatan' => 'required|string',
            'status' => 'required|in:Menunggu,Dalam Proses,Selesai,Batal',
            'obat_id' => 'nullable|array',
            'obat_id.*' => 'exists:obat,id'
        ]);

        DB::beginTransaction();
        try {
            $periksa = Periksa::findOrFail($id);

            $periksa->update([
                'tgl_periksa' => $request->tgl_periksa,
                'catatan' => $request->catatan,
                'status' => $request->status,
                'biaya_periksa' => $periksa->biaya_periksa ?? 150000
            ]);

            $periksa->daftarPoli->update(['status' => $request->status]);

            DetailPeriksa::where('id_periksa', $periksa->id)->delete();

            if ($request->has('obat_id')) {
                foreach ($request->obat_id as $obatId) {
                    DetailPeriksa::create([
                        'id_periksa' => $periksa->id,
                        'id_obat' => $obatId
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('dokter.memeriksa')
                ->with('success', 'Pemeriksaan berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function updateStatus($id)
    {
        DB::beginTransaction();
        try {
            $periksa = Periksa::findOrFail($id);
            $periksa->update(['status' => 'Selesai']);
            $periksa->daftarPoli->update(['status' => 'Selesai']);

            DB::commit();
            return redirect()->route('dokter.memeriksa')
                ->with('success', 'Status pemeriksaan berhasil diubah menjadi Selesai.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
