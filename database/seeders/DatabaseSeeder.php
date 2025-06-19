<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Jalankan semua seeder yang diperlukan
        $this->call([
            UserSeeder::class,
            PoliSeeder::class,
            ObatSeeder::class,
            DokterSeeder::class,
            PasienSeeder::class,
            JadwalPeriksaSeeder::class,
        ]);
    }
}
