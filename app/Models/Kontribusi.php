<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontribusi extends Model
{
    use HasFactory;

    protected $table = 'kontribusis'; // pastikan sesuai nama tabel di migration

    protected $fillable = ['user_id', 'jenis_sampah', 'berat', 'emisi'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
