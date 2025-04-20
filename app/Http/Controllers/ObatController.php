<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Cache\RedisTaggedCache;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    // Menampilkan, Menambah, update dan hapus Obat
    public function index()
    {
        // Mengambil data dna ditampilkan 
        $obats = Obat::all();
        return view('dokter.obat.index', compact('obats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required|string',
            'kemasan' => 'required|string',
            'harga' => 'required|integer',
        ]);

        Obat::create([
            'nama_obat' => $request->nama_obat,
            'kemasan' => $request->kemasan,
            'harga' => $request->harga,
        ]);

        return redirect()->back();
    }

    public function edit($id)
    {
        // find == ambil 1 data dari id nya
        $obat = Obat::find($id);
        return view('dokter.obat.edit', compact('obat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_obat' => 'required|string',
            'kemasan' => 'required|string',
            'harga' => 'required|integer',
        ]);

        $obat = Obat::find($id);
        $obat->update([
            'nama_obat' => $request->nama_obat,
            'kemasan' => $request->kemasan,
            'harga' => $request->harga,
        ]);

        return redirect()->route('dokter.obat');
    }

    public function delete($id)
    {
        $obats = Obat::find($id);
        $obats->delete();

        return redirect()->back();
    }
}
