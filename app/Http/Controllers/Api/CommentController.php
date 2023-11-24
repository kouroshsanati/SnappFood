<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest\ShowCommentRequest;
use App\Http\Requests\CommentRequest\StoreCommentRequest;
use App\Http\Resources\CommentCollection;
use App\Models\Comment;
use App\Models\Food;
use App\Models\Restaurant;


class CommentController extends Controller
{

    public function index(ShowCommentRequest $request)
    {
        if ($request->validated('restaurant_id') !== null) {
            $restaurant_id = $request->get('restaurant_id');
            $comments = Restaurant::query()->find($restaurant_id)->comments;
            return response()->json(['data' => new CommentCollection($comments)], 200);
        } elseif ($request->validated('food_id') !== null) {

            $food_id = $request->get('food_id');

            $comments = Food::query()->find($food_id)->carts->filter(function ($cart) {
                return $cart->comments->first() !== null;
            })->map(function ($cart) {
                return $cart->comments->first();
            });
            //dd($food);
            return response()->json(['data' => new CommentCollection($comments)], 200);
        }


    }


    public function store(StoreCommentRequest $request)
    {

        $this->authorize('create', Comment::class);
        $comment = Comment::query()->create($request->validated());
        return response()->json([
            'message' => 'Comment  added successfully',
        ], 201);
    }


}
