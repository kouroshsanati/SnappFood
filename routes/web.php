<?php

//use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\CartController;
use App\Http\Controllers\ArchivedCartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//default laravel routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


// admin routes
Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::resource('foodCategories', \App\Http\Controllers\FoodCategoryController::class);
    Route::resource('restaurantCategories', \App\Http\Controllers\RestaurantCategoryController::class);
    Route::resource('restaurants', \App\Http\Controllers\RestaurantController::class);
    Route::resource('foods', \App\Http\Controllers\FoodController::class);
    Route::resource('order',\App\Http\Controllers\OrderController::class);


    //Route::patch('/carts/{cartId}/update-status', [\App\Http\Controllers\OrderController::class, 'updateStatus'])->name('carts.updateStatus');



    Route::patch('/carts/{cartId}/update-status', [CartController::class, 'updateStatus'])
        ->name('carts.updateStatus');

    Route::get('/archived-carts', [ArchivedCartController::class, 'index'])->name('archived_carts.index');

    Route::get('/carts/comments', [CommentController::class, 'index'])->name('comments.index');

    Route::post('/carts/comments/{comment}/reply', [CommentController::class, 'reply'])->name('comments.reply');

    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');


});





