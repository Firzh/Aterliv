<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjemputan extends Model
{
    // Nama tabel di database
    protected $table = 'penjemputan_sampah';  // tambahkan ini supaya pakai tabel penjemputan, bukan penjemputans

    // Kalau ada kolom yang bisa diisi massal, isi fillable:
    protected $fillable = [
        'nama',
        'telepon',
        'tanggal_penjemputan',
        'waktu_penjemputan',
        'jenis_sampah',
        'perkiraan_berat',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}
