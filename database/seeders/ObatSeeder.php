<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Obat;

class ObatSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan data obat yang dimasukkan sudah sesuai dengan model
        Obat::create([
            'nama_obat' => 'Paracetamol',
            'kemasan' => 'Strip 10 Tablet',
            'harga' => 10000,
        ]);

        Obat::create([
            'nama_obat' => 'Amoxicillin',
            'kemasan' => 'Botol 50 Tablet',
            'harga' => 25000,
        ]);
    }
}
