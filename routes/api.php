<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AuthController;
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

    Route::prefix('restaurants')->controller(\App\Http\Controllers\RestaurantController::class)->name('restaurants')
        ->group(function () {
            Route::get('/', 'index')->name('index');

        });


});
