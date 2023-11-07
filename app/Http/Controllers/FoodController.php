<?php

namespace App\Http\Controllers;

use App\Http\Requests\Food\StoreFoodRequest;
use App\Http\Requests\Food\UpdateFoodRequest;
use App\Models\Food;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Food::class);
        return view('food.index', [
            'foods' => Food::query()->where('restaurant_id', Auth::user()->restaurant->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Food::class);
        return view('food.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFoodRequest $request)
    {
        /*dd($request->validated());*/
        $this->authorize('create', Food::class);
        Food::query()->create(
            $request->validated()
        );
        return redirect()->route('foods.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Food $food)
    {
        $this->authorize('view', $food);
        return view('food.show', [
            'food' => $food
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Food $food)
    {
        $this->authorize('update', $food);
        return view('food.edit', [
            'food' => $food
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFoodRequest $request, Food $food)
    {
        $this->authorize('update', $food);
        $food->update($request->validated());
        return redirect()->route('foods.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Food $food)
    {
        $this->authorize('delete', $food);
        $food->delete();
        return redirect()->route('foods.index');
    }


}
