<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cartFood extends Model
{
    use HasFactory;

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function foods()
    {
        return $this->hasMany(Food::class);
    }
}
