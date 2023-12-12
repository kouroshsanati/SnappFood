<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartRequest\StoreCartRequest;
use App\Http\Requests\CartRequest\UpdateCartRequest;
use App\Http\Resources\CartCollection;
use App\Http\Resources\CartResource;
use App\Models\ArchivedCart;
use App\Models\Cart;
use App\Models\cartFood;
use App\Models\Food;
use App\Notifications\CartStatusUpdated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carts = Auth::user()->carts;
        return response()->json(['data' => new CartCollection($carts)], 200);
    }

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

        return response()->json([
            'message' => "food added to cart successfully",
            'cart_id' => $cart->id,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        return response()->json(['data' => new CartResource($cart)], 200);
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


    public function updateStatus(Request $request, $cartId)
    {
        $cart = Cart::findOrFail($cartId);

        $request->validate([
            'status' => 'required|in:InProgress,preparing,send,delivered',
        ]);

        $newStatus = $request->input('status');

        if ($newStatus === 'delivered') {
            // Create an ArchivedCart instead of deleting the cart
            ArchivedCart::create([
                'user_id' => $cart->user_id,
                'restaurant_id' => $cart->restaurant_id,
                'is_paid' => $cart->is_paid,
                'status' => 'delivered',
                'price_total' => $cart->price_total,
            ]);

            // Update the status of the current cart
            $cart->update(['status' => $newStatus]);

            // Redirect to the 'order.index' route after delivery
            return redirect()->route('order.index')->with('success', 'وضعیت سفارش با موفقیت به‌روزرسانی شد.');
        } else {
            $cart->update(['status' => $newStatus]);
        }

        Notification::send(
            auth()->user(),
            new CartStatusUpdated($cart)
        );

        return redirect()->route('carts.index')->with('success', 'وضعیت سفارش با موفقیت به‌روزرسانی شد.');
    }





    public function pay(Cart $cart)
    {
        $cart->update([
            'is_paid' => 1
        ]);
    }
}
