<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Kontribusi;

class User extends Authenticatable
{
    public function kontribusi() {
        return $this->hasMany(Kontribusi::class);
    }

    public function penukarans() {
        return $this->hasMany(PenukaranPoin::class);
    }

    public function getLevel()
    {
        if ($this->points >= 1000) {
            return 'Master';
        } elseif ($this->points >= 500) {
            return 'Expert';
        } elseif ($this->points >= 100) {
            return 'Intermediate';
        } else {
            return 'Beginner';
        }
    }
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'points'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
