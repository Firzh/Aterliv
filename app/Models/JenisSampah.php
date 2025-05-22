<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSampah extends Model
{
    use HasFactory;
    
    protected $table = 'jenis_sampah';
    
    protected $fillable = [
        'nama',
        'deskripsi',
        'ciri_ciri',
        'contoh',
        'cara_daur_ulang',
        'gambar'
    ];
    
    public function kalkulatorSampah()
    {
        return $this->hasOne(KalkulatorSampah::class);
    }
}