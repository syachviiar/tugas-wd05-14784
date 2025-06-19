<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JadwalPeriksa;
use App\Models\Dokter;

class JadwalPeriksaSeeder extends Seeder
{
    public function run(): void
    {
        $hariList = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        $dokters = Dokter::all();

        foreach ($dokters as $dokter) {
            for ($i = 0; $i < 3; $i++) {
                JadwalPeriksa::create([
                    'dokter_id'   => $dokter->id,
                    'hari'        => $hariList[($i + $dokter->id) % count($hariList)],
                    'jam_mulai'   => now()->setTime(8 + $i * 2, 0)->format('H:i:s'), // 08:00, 10:00, 12:00 dst
                    'jam_selesai' => now()->setTime(9 + $i * 2, 0)->format('H:i:s'), // 09:00, 11:00, 13:00 dst
                    'status'      => 'Aktif',
                ]);
            }
        }
    }
}
