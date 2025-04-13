<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 
        'email', 
        'cnpj', 
        'password'
    ];

    protected $hidden = [
        'password', 
        'remember_token'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function trucks()
    {
        return $this->hasMany(Truck::class);
    }

    public function drivers()
    {
        return $this->hasMany(Driver::class);
    }

    public function routes()
    {
        return $this->hasMany(Route::class);
    }
}