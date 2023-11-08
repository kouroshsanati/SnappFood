<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RestaurantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/hello', function () {
        return 'hello';
    });

    Route::prefix('addresses')->controller(AddressController::class)->name('addresses')
        ->group(function () {
            Route::get('/', 'index')->name('.index');
            Route::get('/{address}', 'show')->name('.show');
            Route::post('/', 'store')->name('.store');
            Route::put('/{address}/', 'update')->name('.update');
            Route::delete('/{address}/', 'destroy')->name('.destroy');
            Route::patch('/{address}/', 'updateUserAddress');

        });

    Route::prefix('/restaurants')->controller(RestaurantController::class)->name('restaurants')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/{restaurant}/', 'show')->name('show');
        });

    Route::get('/restaurants/{restaurant}/foods', [\App\Http\Controllers\FoodController::class, 'indexApi']);


    Route::prefix('carts')->controller(\App\Http\Controllers\CartController::class)->name('carts')->group(function () {
        Route::get('/', 'index')->name('.index');
        Route::post('/add', 'store')->name('.store');
        Route::patch('/{cart}/', 'store')->name('.store');
    });


});
