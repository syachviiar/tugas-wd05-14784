<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Dokter
        User::insert([
            ['name' => 'dr. Nanda Syafira', 'email' => 'nanda@rs.com', 'password' => bcrypt('password'), 'role' => 'dokter'],
            ['name' => 'dr. Wahyu Ramadhan', 'email' => 'wahyu@rs.com', 'password' => bcrypt('password'), 'role' => 'dokter'],
            ['name' => 'dr. Sinta Ayu', 'email' => 'sinta@rs.com', 'password' => bcrypt('password'), 'role' => 'dokter'],
            ['name' => 'dr. Aldi Firmansyah', 'email' => 'aldi@rs.com', 'password' => bcrypt('password'), 'role' => 'dokter'],
            ['name' => 'dr. Rina Pratiwi', 'email' => 'rina@rs.com', 'password' => bcrypt('password'), 'role' => 'dokter'],
            ['name' => 'dr. Faiz Ramli', 'email' => 'faiz@rs.com', 'password' => bcrypt('password'), 'role' => 'dokter'],
        ]);

        // Pasien
        User::insert([
            ['name' => 'Rudi Hartono', 'email' => 'rudi@gmail.com', 'password' => bcrypt('password'), 'role' => 'pasien'],
            ['name' => 'Dina Ayu', 'email' => 'dina@gmail.com', 'password' => bcrypt('password'), 'role' => 'pasien'],
            ['name' => 'Andriansyah', 'email' => 'andri@gmail.com', 'password' => bcrypt('password'), 'role' => 'pasien'],
            ['name' => 'Maya Lestari', 'email' => 'maya@gmail.com', 'password' => bcrypt('password'), 'role' => 'pasien'],
            ['name' => 'Galih Saputra', 'email' => 'galih@gmail.com', 'password' => bcrypt('password'), 'role' => 'pasien'],
            ['name' => 'Sari Wulandari', 'email' => 'sari@gmail.com', 'password' => bcrypt('password'), 'role' => 'pasien'],
            ['name' => 'Teguh Prasetyo', 'email' => 'teguh@gmail.com', 'password' => bcrypt('password'), 'role' => 'pasien'],
            ['name' => 'Anisa Zahra', 'email' => 'anisa@gmail.com', 'password' => bcrypt('password'), 'role' => 'pasien'],
        ]);
    }
}
