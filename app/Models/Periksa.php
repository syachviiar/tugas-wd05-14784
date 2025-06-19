<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Periksa extends Model
{
    protected $table = 'periksa';

    protected $fillable = [
        'daftar_poli_id',
        'tgl_periksa',
        'catatan',
        'biaya_periksa',
        'status'
    ];

    protected $attributes = [
        'status' => 'Menunggu'
    ];

    /**
     * Set default biaya_periksa sebelum record dibuat jika belum diisi.
     */
    protected static function booted()
    {
        static::creating(function ($periksa) {
            if (is_null($periksa->biaya_periksa)) {
                $periksa->biaya_periksa = 150000;
            }
        });
    }

    // Relasi ke daftar_poli
    public function daftarPoli()
    {
        return $this->belongsTo(DaftarPoli::class, 'daftar_poli_id');
    }

    // Relasi ke detail_periksa
    public function detailPeriksa()
    {
        return $this->hasMany(DetailPeriksa::class, 'id_periksa');
    }

    // Akses langsung ke pasien via daftar_poli
    public function getPasienAttribute()
    {
        return $this->daftarPoli?->pasien;
    }

    // Akses langsung ke dokter via jadwal daftar_poli
    public function getDokterAttribute()
    {
        return $this->daftarPoli?->jadwal?->dokter;
    }

    // Akses langsung ke jadwal via daftar_poli
    public function getJadwalAttribute()
    {
        return $this->daftarPoli?->jadwal;
    }
}
