<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LokasiDaurUlang extends Model
{
    use HasFactory;
    
    protected $table = 'lokasi_daur_ulang';
    
    protected $fillable = [
        'nama',
        'alamat',
        'kota',
        'kecamatan',
        'telepon',
        'email',
        'jenis_sampah_diterima',
        'jam_operasional',
        'latitude',
        'longitude'
    ];
}