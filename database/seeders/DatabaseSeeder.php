<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Panggil seeder lainnya
        $this->call([
            PasienSeeder::class,
            ObatSeeder::class,
            UserSeeder::class, // Pastikan ini ada
        ]);
    }
}
