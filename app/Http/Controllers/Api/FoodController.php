<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Food\StoreFoodRequest;
use App\Http\Requests\Food\UpdateFoodRequest;
use App\Http\Resources\FoodCategoryCollection;
use App\Http\Resources\FoodCategoryResource;
use App\Models\Food;
use App\Models\FoodCategory;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;

class FoodController extends Controller
{
    public function indexApi(Restaurant $restaurant)
    {
        $foods = $restaurant->foods;
        $category_id = [];
        foreach ($foods as $food) {
            $category_id[] = $food->food_category_id;

        }
        $response = new FoodCategoryCollection(FoodCategory::query()->whereIn('id', $category_id)->get());
        return response($response, 200);
    }


}
