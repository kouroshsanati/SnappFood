<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest\StoreCartRequest;
use App\Http\Requests\CartRequest\UpdateCartRequest;
use App\Http\Resources\CartCollection;
use App\Http\Resources\CartFoodResource;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Models\cartFood;
use App\Models\Food;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carts = Auth::user()->carts;
        return response(new CartCollection($carts));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCartRequest $request)
    {
        $foodId = $request->post('food_id');
        $food = Food::query()->find($foodId);
        $restaurantId = $food->restaurant_id;
        $count = $request->count;

        $totalPrice = ($food->price * (100 - $food->discount) / 100) * $count;
        $cart = Cart::query()->create([
            'user_id' => Auth::user()->id,
            'restaurant_id' => $restaurantId,
            'price_total' => $totalPrice,
        ]);
        cartFood::query()->create([
            'cart_id' => $cart->id,
            'food_id' => $foodId,
            'count' => $count,
        ]);

        return response([
            'message' => "food added to cart successfully",
            'cart_id' => $cart->id,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        return response(new CartResource($cart));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        $foodId = $request->post('food_id');
        $count = $request->count;
        $food = Food::query()->find($foodId);

        $cartFood = cartFood::query()->create([
            'cart_id' => $cart->id,
            'food_id' => $foodId,
            'count' => $count,
        ]);
        $extraPrice = ($food->price * (100 - $food->discount) / 100) * $count;
        $cart->update([
            'price_total' => $extraPrice + $cart->price_total,
        ]);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function pay(Cart $cart)
    {
        $cart->update([
            'is_paid' => 1
        ]);
    }
}
