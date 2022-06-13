<?php

use App\Http\Controllers\CarsController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[ProductsController::class,'index'])->name('index');
Route::get('/cerrar',[ProductsController::class,'cerrar']);




Auth::routes();

Route::post('/cart', [CarsController::class, 'store'])->name('cart');
Route::get('/checkout', [CarsController::class, 'index'])->name('checkout');
Route::get('/checkout/get/items', [CarsController::class, 'getCarItemsForCheckout']);
Route::post('/process/user/payment', [CarsController::class, 'processPayment']);

Route::get('/items',[ProductsController::class,'show'])->name('items-view');
Route::post('/items/store',[ProductsController::class,'store']);


Route::get('/category',[CategoryController::class,'index'])->name('category-view');
Route::post('/category/store',[CategoryController::class,'store']);







