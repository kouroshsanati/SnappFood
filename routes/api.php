<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\RestaurantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

//region test
    Route::get('/hello', function () {
        return 'hello';
    });
    //endregion
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
    //end region

    //region comments
    Route::apiResource('comments', CommentController::class);
    /*Route::get('comments', [CommentController::class, 'index']);
    Route::post('comments', [CommentController::class, 'store']);*/
//endregion

});
