<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function food()
    {
        return $this->hasMany(Food::class);
    }

    public function restaurantCategory()
    {
        return $this->belongsTo(RestaurantCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
