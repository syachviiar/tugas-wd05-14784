<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPeriksa extends Model
{
    use HasFactory;

    protected $table = 'jadwal_periksa';

    protected $fillable = [
        'dokter_id',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'status'
    ];

    /**
     * Relasi ke model Dokter
     */
    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'dokter_id');
    }

    /**
     * Relasi ke daftar_poli (banyak)
     */
    public function daftarPoli()
    {
        return $this->hasMany(DaftarPoli::class, 'jadwal_id');
    }

    /**
     * Accessor untuk nama dokter (optional, untuk kemudahan tampilan)
     */
    public function getNamaDokterAttribute()
    {
        return $this->dokter?->user?->name ?? '-';
    }
}
