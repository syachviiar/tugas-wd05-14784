<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarPoli extends Model
{
    use HasFactory;

    protected $table = 'daftar_polis';
    
    protected $fillable = [
        'pasien_id',
        'poli_id',
        'jadwal_id',
        'keluhan',
        'no_antrian',
        'status'
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'pasien_id');
    }

    public function poli()
    {
        return $this->belongsTo(Poli::class);
    }
    public function jadwal()
    {
        return $this->belongsTo(JadwalPeriksa::class, 'jadwal_id');
    }

    public function periksa()
    {
        return $this->hasOne(Periksa::class, 'daftar_poli_id');
    }

    public static function generateNoAntrian($poli_id, $tanggal)
    {
        $lastAntrian = self::where('poli_id', $poli_id)
            ->whereDate('tanggal_daftar', $tanggal)
            ->orderBy('no_antrian', 'desc')
            ->first();

        return $lastAntrian ? $lastAntrian->no_antrian + 1 : 1;
    }
} 