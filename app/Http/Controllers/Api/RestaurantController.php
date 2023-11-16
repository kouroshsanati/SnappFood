<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FilterRequest;
use App\Http\Requests\RestaurantRequest\StoreRestaurantRequest;
use App\Http\Requests\RestaurantRequest\UpdateRestaurantRequest;
use App\Http\Resources\RestaurantResource;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FilterRequest $request)
    {
        $restaurants = Restaurant::query();
        if ($request->has('is_open')) {
           $restaurants =  $restaurants->where('is_open', $request->is_open);
        }
        return response()->json(['data' => RestaurantResource::collection($restaurants->get())], 200);

    }


    /**
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant)
    {
        return new RestaurantResource($restaurant);
    }


}
