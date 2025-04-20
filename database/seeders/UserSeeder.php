<?php

namespace Database\Seeders;

use Attribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'Dokter',
            'alamat' => 'Jl.Dokter No. 1',
            'no_hp' => '081225099450',
            'email' => 'dokter@gmail.com',
            'role' => 'dokter',
            'password' => bcrypt('dokter123'),
        ]);

        User::create([
            'nama' => 'Pasien',
            'alamat' => 'Jl.Pasien No. 1',
            'no_hp' => '081225099450',
            'email' => 'pasien@gmail.com',
            'role' => 'pasien',
            'password' => bcrypt('pasien123'),
        ]);
    }
}
