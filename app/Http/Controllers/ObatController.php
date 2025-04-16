<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
        $obats = Obat::all();
        return view('dokter.obat.index', compact('obats')); // Pastikan ini
    }

    public function create()
    {
        $obats = Obat::all(); // Menyiapkan daftar obat
        return view('dokter.obat.index', ['obats' => $obats]); // Ini yang benar
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'kemasan' => 'required|string|max:255',
            'harga' => 'required|integer',
        ]);

        Obat::create($request->all());
        return redirect()->route('obat.index')->with('success', 'Obat berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $obat = Obat::findOrFail($id);
        $obats = Obat::all(); // Menyiapkan daftar obat
        return view('dokter.obat.index', compact('obat', 'obats')); // Pastikan ini
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'kemasan' => 'required|string|max:255',
            'harga' => 'required|integer',
        ]);

        $obat = Obat::findOrFail($id);
        $obat->update($request->all());

        return redirect()->route('obat.index')->with('success', 'Obat berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $obat = Obat::findOrFail($id);
        $obat->delete();

        return redirect()->route('obat.index')->with('success', 'Obat berhasil dihapus.');
    }
}