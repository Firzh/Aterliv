<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjemputanSampah extends Model
{
    use HasFactory;
    
    protected $table = 'penjemputan_sampah';
    
    protected $fillable = [
        'user_id',
        'nama',
        'alamat',
        'kota',
        'kecamatan',
        'telepon',
        'tanggal_penjemputan',
        'waktu_penjemputan',
        'jenis_sampah',
        'perkiraan_berat',
        'catatan',
        'status'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}