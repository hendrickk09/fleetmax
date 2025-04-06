<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $fillable = ['origin', 'destination', 'distance', 'estimated_time', 'driver_id', 'truck_id', 'user_id'];
}
