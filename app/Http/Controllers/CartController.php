<?php

namespace App\Http\Controllers;

use App\Http\Resources\CartCollection;
use App\Models\Cart;
use App\Models\cartFood;
use App\Models\Food;
use App\Models\User;
use Illuminate\Http\Request;
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
    public function store(Request $request)
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
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
