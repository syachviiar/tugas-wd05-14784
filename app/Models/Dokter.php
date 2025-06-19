<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    protected $table = 'dokters';

    protected $fillable = [
        'nama',
        'alamat',
        'nama_poli',
        'email',
        'no_hp',
        'poli_id',
        'user_id',
    ];

    /**
     * Relasi ke User (dokter adalah user)
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relasi ke Poli
     */
    public function poli()
    {
        return $this->belongsTo(Poli::class, 'poli_id');
    }

    /**
     * Relasi ke Jadwal Periksa (banyak)
     */
    public function jadwalPeriksa()
    {
        return $this->hasMany(JadwalPeriksa::class, 'dokter_id');
    }

    /**
     * Accessor nama lengkap dokter (opsional, untuk tampilan)
     */
    public function getNamaLengkapAttribute()
    {
        return $this->user?->name ?? $this->nama ?? '-';
    }
}
