<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pasien;
use App\Models\User;

class PasienSeeder extends Seeder
{
    public function run(): void
    {
        $pasienUsers = User::where('role', 'pasien')->get();

        $data = [];
        $i = 1;

        foreach ($pasienUsers as $user) {
            $data[] = [
                'user_id' => $user->id,
                'nama'    => $user->name,
                'email'   => $user->email,
                'no_rm'   => 'P00' . $i,
                'alamat'  => fake()->address(),
                'no_hp'   => '0812' . rand(10000000, 99999999),
                'no_ktp'  => '32111111111100' . str_pad($i, 2, '0', STR_PAD_LEFT),
            ];
            $i++;
        }

        Pasien::insert($data);
    }
}
