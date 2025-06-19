<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dokter;
use App\Models\User;

class DokterSeeder extends Seeder
{
    public function run(): void
    {
        $dokterUsers = User::where('role', 'dokter')->get();

        $polis = [
            1 => 'Poli Saraf',
            2 => 'Poli Kulit',
            3 => 'Poli THT',
        ];

        $data = [];
        $i = 1;

        foreach ($dokterUsers as $user) {
            $poliId = ($i % 3) + 1; // rotasi 1-3

            $data[] = [
                'user_id'    => $user->id,
                'nama'       => $user->name,
                'email'      => $user->email,
                'nama_poli'  => $polis[$poliId],
                'poli_id'    => $poliId,
                'alamat'     => fake()->address(),
                'no_hp'      => '0812' . rand(10000000, 99999999),
            ];
            $i++;
        }

        Dokter::insert($data);
    }
}
