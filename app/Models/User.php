<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Maker;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guarded = [];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function maker()
    {
        return $this->hasOne(Maker::class);
    }
    
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
