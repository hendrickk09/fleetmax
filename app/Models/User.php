<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = ['name', 'email', 'cnpj', 'password'];
    protected $hidden = ['password', 'remember_token'];
}
