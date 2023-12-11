<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchivedCart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'restaurant_id',
        'is_paid',
        'status',
        'price_total',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function cartFoods()
    {
        return $this->hasMany(cartFood::class);
    }


}
