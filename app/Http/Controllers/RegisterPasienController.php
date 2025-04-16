<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class RegisterPasienController extends Controller
{
    public function index()
    {
        $pasiens = Pasien::all();
        return view('pasien.register.index', compact('pasiens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string|max:20',
        ]);

        Pasien::create($request->all());

        return redirect()->route('pasien.register.index')->with('success', 'Data pasien berhasil disimpan.');
    }

    public function edit($id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasiens = Pasien::all();
        return view('pasien.register.index', compact('pasien', 'pasiens'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string|max:20',
        ]);

        $pasien = Pasien::findOrFail($id);
        $pasien->update($request->all());

        return redirect()->route('pasien.register.index')->with('success', 'Data pasien berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();

        return redirect()->route('pasien.register.index')->with('success', 'Data pasien berhasil dihapus.');
    }
}