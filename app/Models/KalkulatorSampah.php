<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KalkulatorSampah extends Model
{
    use HasFactory;
    
    protected $table = 'kalkulator_sampah';
    
    protected $fillable = [
        'jenis_sampah_id',
        'faktor_emisi',
        'faktor_pengurangan'
    ];
    
    public function jenisSampah()
    {
        return $this->belongsTo(JenisSampah::class);
    }
}