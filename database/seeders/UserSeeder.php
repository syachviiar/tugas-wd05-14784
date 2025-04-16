<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'nama' => 'Dokter A',
            'alamat' => 'Jl. Kesehatan No. 15',
            'no_hp' => '082345678901',
            'email' => 'doktera@example.com',
            'role' => 'dokter',
            'password' => bcrypt('password123'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'nama' => 'Pasien B',
            'alamat' => 'Jl. Sehat No. 20',
            'no_hp' => '083456789012',
            'email' => 'pasienb@example.com',
            'role' => 'pasien',
            'password' => bcrypt('password123'),
            'email_verified_at' => now(),
        ]);
    }
}