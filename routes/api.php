<?php

use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\FoodController;
use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

//region test
    Route::get('/hello', function () {
        return 'hello';
    });
    //endregion

    Route::put('update/personal', UserController::class);
//region address
    Route::apiResource('addresses', AddressController::class);
    Route::patch('addresses/{address}', [AddressController::class, 'updateUserAddress']);
    //endregion
//region restaurants
    Route::apiResource('restaurants', RestaurantController::class);
    //endregion
//region foods
    Route::get('/restaurants/{restaurant}/foods', [FoodController::class, 'indexApi']);
    //endregion

//region cart
    Route::apiResource('carts', CartController::class);
    Route::patch('carts/{cart}/pay', [CartController::class, 'pay']);
    //endregion

    //region comments
    Route::apiResource('comments', CommentController::class);

//endregion

});
