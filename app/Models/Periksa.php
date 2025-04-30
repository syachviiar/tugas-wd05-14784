<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periksa extends Model
{
    use HasFactory;

    // Tentukan kolom yang bisa diisi
    protected $fillable = [
        'id_pasien',
        'id_dokter',
        'tgl_periksa',
        'catatan',
        'biaya_periksa',
        'diagnosa',       // Kolom diagnosa
        'rekomendasi',    // Kolom rekomendasi
        'status',         // Kolom status
    ];

    // Tentukan nama tabel jika nama tabel tidak mengikuti konvensi
    protected $table = 'periksa';  // Pastikan nama tabel adalah 'periksa'

    // Definisikan relasi
    public function pasien()
    {
        return $this->belongsTo(User::class, 'id_pasien');
    }

    public function dokter()
    {
        return $this->belongsTo(User::class, 'id_dokter');
    }

    // Relasi dengan detail periksa (obat yang diberikan)
    public function detailPeriksa()
    {
        return $this->hasMany(DetailPeriksa::class, 'id_periksa');
    }
}