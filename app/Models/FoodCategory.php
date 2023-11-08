<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodCategory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function foods()
    {
        return $this->hasMany(Food::class);
    }
}
