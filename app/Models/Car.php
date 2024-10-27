<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;


    public function carbrand()
    {
        return $this->belongsTo(CarBrand::class, 'brand');
    }
     public function inquiries()
        {
            return $this->hasMany(Inquiry::class, 'car_id');
        }
}
