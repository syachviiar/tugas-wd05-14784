<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Obat;

class ObatSeeder extends Seeder
{
    public function run(): void
    {
        Obat::insert([
            ['nama_obat' => 'Ibuprofen 400mg', 'kemasan' => 'Strip 10 tablet', 'harga' => 8000],
            ['nama_obat' => 'Metformin 500mg', 'kemasan' => 'Botol 60 tablet', 'harga' => 22000],
            ['nama_obat' => 'Loperamide 2mg', 'kemasan' => 'Strip 10 kapsul', 'harga' => 6000],
            ['nama_obat' => 'Diazepam 5mg', 'kemasan' => 'Strip 10 tablet', 'harga' => 9500],
            ['nama_obat' => 'Simvastatin 20mg', 'kemasan' => 'Strip 10 tablet', 'harga' => 11000],
            ['nama_obat' => 'Dextromethorphan', 'kemasan' => 'Botol 60ml', 'harga' => 7000],
            ['nama_obat' => 'Hydrocortisone Cream', 'kemasan' => 'Tube 15g', 'harga' => 18000],
            ['nama_obat' => 'Losartan 50mg', 'kemasan' => 'Strip 10 tablet', 'harga' => 12000],
            ['nama_obat' => 'Mefenamic Acid 500mg', 'kemasan' => 'Strip 10 tablet', 'harga' => 7500],
            ['nama_obat' => 'Cetirizine Syrup', 'kemasan' => 'Botol 60ml', 'harga' => 14000],
        ]);
    }
}
