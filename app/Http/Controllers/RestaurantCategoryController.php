<?php

namespace App\Http\Controllers;

use App\Models\RestaurantCategory;
use App\Http\Requests\StoreRestaurantCategoryRequest;
use App\Http\Requests\UpdateRestaurantCategoryRequest;

class RestaurantCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', RestaurantCategory::class);
        return view('restaurantCategory.index', [
            'categories' => RestaurantCategory::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', RestaurantCategory::class);
        return view('restaurantCategory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRestaurantCategoryRequest $request)
    {
        $this->authorize('create', RestaurantCategory::class);
        RestaurantCategory::query()->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(RestaurantCategory $restaurantCategory)
    {
        $this->authorize('view', RestaurantCategory::class);
        return view('restaurantCategory.show', [
            'category' => $restaurantCategory
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RestaurantCategory $restaurantCategory)
    {
        $this->authorize('update', RestaurantCategory::class);
        return view('restaurantCategory.edit', [
            'category' => $restaurantCategory
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRestaurantCategoryRequest $request, RestaurantCategory $restaurantCategory)
    {
        $this->authorize('update', RestaurantCategory::class);
        $restaurantCategory->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RestaurantCategory $restaurantCategory)
    {
        $this->authorize('delete', RestaurantCategory::class);
        $restaurantCategory->delete();
    }
}
