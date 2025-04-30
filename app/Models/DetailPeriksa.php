<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPeriksa extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika diperlukan
    protected $table = 'detail_periksa';

    // Tentukan kolom yang dapat diisi
    protected $fillable = ['id_periksa', 'id_obat'];

    // Definisikan relasi ke tabel Periksa
    public function periksa()
    {
        return $this->belongsTo(Periksa::class, 'id_periksa');
    }

    // Definisikan relasi ke tabel Obat
    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat');
    }
}