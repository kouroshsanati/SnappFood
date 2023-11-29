<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
        $cart = Cart::findOrFail($cartId); // یافتن سبد خرید با استفاده از شناسه

        $request->validate([
            'status' => 'required|in:InProgress,preparing,send,delivered', // اعتبارسنجی وضعیت
        ]);

        $cart->update(['status' => $request->input('status')]); // بروزرسانی وضعیت

        return redirect()->route('carts.index')->with('success', 'وضعیت سفارش با موفقیت به‌روزرسانی شد.');
    }
}
