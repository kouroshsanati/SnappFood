<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest\StoreCommentRequest;
use App\Http\Requests\CommentRequest\UpdateCommentRequest;
use App\Http\Resources\CommentCollection;
use App\Models\Comment;

use App\Models\Restaurant;
use Illuminate\Http\Request;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $restaurant_id = $request->get('restaurant_id');

        $comments = Restaurant::query()->find($restaurant_id)->comments;
        //dd($comments);

        return response(new CommentCollection($comments));


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
    public function store(StoreCommentRequest $request)
    {
        $comment = Comment::query()->create($request->validated());
        return response([
            'message' => 'Comment  added successfully',
        ], 201);


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
    public function update(UpdateCommentRequest $request, string $id)
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
