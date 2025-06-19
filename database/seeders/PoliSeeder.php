<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Poli;

class PoliSeeder extends Seeder
{
    public function run(): void
    {
        Poli::insert([
            ['nama_poli' => 'Poli Saraf', 'keterangan' => 'Pelayanan untuk gangguan saraf'],
            ['nama_poli' => 'Poli Kulit', 'keterangan' => 'Pelayanan penyakit kulit dan kelamin'],
            ['nama_poli' => 'Poli THT', 'keterangan' => 'Telinga, Hidung, Tenggorokan'],
        ]);
    }
}

