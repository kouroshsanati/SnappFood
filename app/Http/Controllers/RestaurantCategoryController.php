<?php

namespace App\Http\Controllers;

use App\Http\Requests\restaurantCategory\StoreRestaurantCategoryRequest;
use App\Http\Requests\restaurantCategory\UpdateRestaurantCategoryRequest;
use App\Models\RestaurantCategory;

class RestaurantCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', RestaurantCategory::class);
        return view('RestaurantCategory.index', [
            'categories' => RestaurantCategory::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', RestaurantCategory::class);
        return view('RestaurantCategory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRestaurantCategoryRequest $request)
    {
        $this->authorize('create', RestaurantCategory::class);
        RestaurantCategory::query()->create($request->validated());
        return redirect()->route('restaurantCategories.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(RestaurantCategory $restaurantCategory)
    {
        $this->authorize('view', RestaurantCategory::class);
        return view('RestaurantCategory.show', [
            'category' => $restaurantCategory
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RestaurantCategory $restaurantCategory)
    {
        $this->authorize('update', RestaurantCategory::class);
        return view('RestaurantCategory.edit', [
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
        return redirect()->route('restaurantCategories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RestaurantCategory $restaurantCategory)
    {
        $this->authorize('delete', RestaurantCategory::class);
        $restaurantCategory->delete();
        return redirect()->route('restaurantCategories.index');
    }
}
