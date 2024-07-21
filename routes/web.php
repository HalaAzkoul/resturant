<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ResturantController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;









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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/resturant', [ResturantController::class, 'index'])->name('restaurant');
Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
//user route
Route::get('/users', [UserController::class, 'index'])->name('users');
Route::delete('/deleteusers/{id}', [UserController::class, 'delete'])->name('deleteusers');



//category route
Route::get('/categoreis', [CategoryController::class, 'index'])->name('category.index');



//food route
Route::get('/foods', [FoodController::class, 'index'])->name('food.index');
Route::get('/food/create', [FoodController::class, 'create'])->name('food.create');
Route::post('food/store', [FoodController::class, 'store'])->name('food.store');
Route::get('/food/{id}/edit', [FoodController::class, 'edit'])->name('food.edit');
Route::put('/food/{id}', [FoodController::class, 'update'])->name('food.update');
Route::delete('/food/{id}', [FoodController::class, 'destroy'])->name('food.destroy');


//category route
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');



//reservation route
Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
Route::post('reservation/store', [ReservationController::class, 'store'])->name('reservations.store');
Route::delete('reservation/{id}', [ReservationController::class, 'destroy'])->name('reservations.destroy');



//cart route

Route::middleware(['auth'])->group(function () {
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.view');
    Route::put('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
});


//dynamic page route


Route::get('/pages', [PageController::class, 'index'])->name('pages.index');
Route::get('/pages/create', [PageController::class, 'create'])->name('pages.create');
Route::post('pages/store', [PageController::class, 'store'])->name('pages.store');
Route::get('/pages/{id}/edit', [PageController::class, 'edit'])->name('pages.edit');
Route::put('/pages/{id}', [PageController::class, 'update'])->name('pages.update');
Route::delete('pages/{id}', [PageController::class, 'destroy'])->name('pages.destroy');
Route::get('/pages/{id}', [PageController::class, 'show'])->name('pages.show');





//photo route


Route::get('/photos', [PhotoController::class, 'index'])->name('photos.index');
Route::get('/photos/create', [PhotoController::class, 'create'])->name('photos.create');
Route::post('photos/store', [PhotoController::class, 'store'])->name('photos.store');
Route::get('/photos/{id}/edit', [PhotoController::class, 'edit'])->name('photos.edit');
Route::put('/photos/{id}', [PhotoController::class, 'update'])->name('photos.update');
Route::delete('photos/{id}', [PhotoController::class, 'destroy'])->name('photos.destroy');

