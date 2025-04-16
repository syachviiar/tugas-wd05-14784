<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pasien;

class PasienSeeder extends Seeder
{
    public function run(): void
    {
        Pasien::create([
            'nama' => 'Muhammad Abil',
            'alamat' => 'Jl. Merdeka No. 1',
            'no_hp' => '081234567890',
        ]);

        Pasien::create([
            'nama' => 'Wildan Syachviar',
            'alamat' => 'Jl. Pahlawan No. 2',
            'no_hp' => '082345678901',
        ]);

        foreach ($pasiens as $pasien) {
            Pasien::create($pasien);
        }
    }
}