<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    // Menentukan kolom yang dapat diisi massal
    protected $fillable = [
        'nama',
        'alamat',
        'no_hp',
    ];
}