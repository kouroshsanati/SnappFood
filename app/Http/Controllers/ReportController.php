<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        $reports = DB::table('carts')
            ->join('cart_food', 'carts.id', '=', 'cart_food.cart_id')
            ->join('food', 'cart_food.food_id', '=', 'food.id')
            ->join('users', 'carts.user_id', '=', 'users.id')
            ->select('users.name as user_name', 'carts.price_total', 'food.name as food_name', 'cart_food.count')
            ->get();

        return view('reports.index', compact('reports'));
    }
}
