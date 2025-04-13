<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'origin', 
        'destination', 
        'departure_date', 
        'estimated_arrival', 
        'return_date', 
        'truck_id', 
        'driver_id', 
        'user_id'
    ];

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function truck()
    {
        return $this->belongsTo(Truck::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}