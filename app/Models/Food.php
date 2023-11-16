<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Food extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function sortedFood()
    {
        $foods = self::query()->where('restaurant_id', Auth::user()->restaurant->id);

        if (request()->get('name') === 'asc') {
            $foods = $foods->orderBy('name');
        }
        if (request()->get('name') === 'desc') {
            $foods = $foods->orderByDesc('name');
        }
        if (request()->get('category') !== null) {
            $foods = $foods->where('food_category_id', request()->get('category'));
        }
        return $foods;
    }

    public function foodCategory()
    {
        return $this->blongsTo(FoodCategory::class);
    }

    public function restaurant()
    {
        return $this->blongsTo(Restaurant::class);
    }
}
