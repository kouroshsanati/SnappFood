<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\RestaurantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
//log testing
    Route::get('/hello', function () {
        return 'hello';
    });
//addresses
    Route::prefix('addresses')->controller(AddressController::class)->name('addresses')
        ->group(function () {
            Route::get('/', 'index')->name('.index');
            Route::get('/{address}', 'show')->name('.show');
            Route::post('/', 'store')->name('.store');
            Route::put('/{address}/', 'update')->name('.update');
            Route::delete('/{address}/', 'destroy')->name('.destroy');
            Route::patch('/{address}/', 'updateUserAddress');

        });
//restaurants
    Route::prefix('/restaurants')->controller(RestaurantController::class)->name('restaurants')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/{restaurant}/', 'show')->name('show');
        });
//food
    Route::get('/restaurants/{restaurant}/foods', [FoodController::class, 'indexApi']);

//carts
    Route::prefix('carts')->controller(CartController::class)->name('carts')->group(function () {
        Route::get('/', 'index')->name('.index');
        Route::post('/add', 'store')->name('.store');
        Route::patch('/{cart}', 'update')->name('.update');
        Route::get('/{cart}', 'show')->name('.show');
        Route::patch('/{cart}/pay', 'pay')->name('.pay');
    });

    //comments

    Route::get('comments',[\App\Http\Controllers\CommentController::class,'index']);
    Route::post('comments',[\App\Http\Controllers\CommentController::class,'store']);


});
