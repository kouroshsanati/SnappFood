<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Notifications\CartStatusUpdated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $carts = Cart::all(); // دریافت تمام ردیف‌های جدول carts

        return view('order.index', compact('carts')); // ارسال اطلاعات به ویو
    }


    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $order)
    {
        return view('order.show',compact('order'));
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
    public function update(Request $request, string $id)
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
    public function updateStatus(Request $request, $cartId)
    {
        $cart = Cart::findOrFail($cartId);

        $request->validate([
            'status' => 'required|in:InProgress,preparing,send,delivered',
        ]);


        $cart->update(['status' => $request->input('status')]);

        // ارسال ایمیل با استفاده از Notification
        Notification::send(
            auth()->user(), // یا ممکن است به کاربر دیگری ارسال شود
            new CartStatusUpdated($cart)
        );

        return redirect()->route('carts.index')->with('success', 'وضعیت سفارش با موفقیت به‌روزرسانی شد.');
    }
}
