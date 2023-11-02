<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function foodCategory()
    {
        return $this->blongsTo(FoodCategory::class);
    }

    public function restaurant()
    {
        return $this->blongsTo(Restaurant::class);
    }
}
