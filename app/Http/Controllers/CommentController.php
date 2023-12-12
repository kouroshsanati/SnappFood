<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Comment;
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

    public function reply(Request $request, Comment $comment)
    {
        $cart = Cart::with('comments')->first();

        $request->validate([
            'reply' => 'required|string',
        ]);

        $reply = new Comment([
            'content' => $request->input('reply'),
            'score' => $request->input('score', 0),
            'cart_id' => $comment->id,
            'parent_id' => $comment->id,
        ]);

        $reply->save();

        return back()->with('success', 'Reply added successfully');
    }

}
