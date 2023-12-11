<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        try {
            $carts = Cart::with('comments')->get();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('carts.index')->with('error', 'Cart not found.');
        }
        return view('comments.index', compact( 'carts'));
    }
}
