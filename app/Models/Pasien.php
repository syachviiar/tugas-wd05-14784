<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasiens';

    protected $fillable = [
        'no_rm',
        'nama',
        'email',
        'alamat',
        'no_ktp',
        'no_hp',
        'user_id'
    ];

    // Relasi dengan model DaftarPoli
    public function daftarPoli()
    {
        return $this->hasMany(DaftarPoli::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function generateNoRM()
    {

        $tahun = date('Y');
        
        $lastPatient = self::where('no_rm', 'like', $tahun . '%')
            ->orderBy('no_rm', 'desc')
            ->first();

        if ($lastPatient) {
            $lastNumber = intval(substr($lastPatient->no_rm, -4));
            $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $newNumber = '0001';
        }

        return $tahun . '-' . $newNumber;
    }
    public static function isRegistered($no_ktp)
    {
        return self::where('no_ktp', $no_ktp)->exists();
    }
} 