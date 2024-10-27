<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    protected $table = 'inquiry';
    protected $fillable = ['car_id', 'name', 'last_name', 'phone', 'email','time','date', 'location1', 'location2', 'location1Coords', 'location2Coords', 'message'];
    
    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id');
    }
}
