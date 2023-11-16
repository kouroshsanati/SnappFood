<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest\StoreCommentRequest;
use App\Http\Resources\CommentCollection;
use App\Models\Comment;
use App\Models\Restaurant;
use Illuminate\Http\Request;


class CommentController extends Controller
{

    public function index(Request $request)
    {
        $restaurant_id = $request->get('restaurant_id');
        $comments = Restaurant::query()->find($restaurant_id)->comments;
        //dd($comments);
        return response()->json(['data' => new CommentCollection($comments)] ,200);
    }


    public function store(StoreCommentRequest $request)
    {
        $comment = Comment::query()->create($request->validated());
        return response()->json([
            'message' => 'Comment  added successfully',
        ], 201);
    }


}
