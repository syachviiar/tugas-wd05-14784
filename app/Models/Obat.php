<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    // Nama tabel (opsional jika nama class dan nama tabel tidak konvensional)
    protected $table = 'obats';

    // Field yang bisa diisi melalui Mass Assignment
    protected $fillable = ['nama_obat', 'kemasan', 'harga'];

    /**
     * Relasi ke detail periksa
     */
    public function detailPeriksa()
    {
        return $this->hasMany(DetailPeriksa::class, 'id_obat');
    }
}