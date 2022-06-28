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

Route::group(['controller'=>CarsController::class],function(){
    Route::post('/cart',  'store')->name('cart');
    Route::get('/checkout',  'index')->name('checkout');
    Route::get('/checkout/get/items',  'getCarItemsForCheckout');
    Route::post('/process/user/payment',  'processPayment');
});


Route::group(['prefix'=>'/items','controller'=>ProductsController::class],function(){
    Route::name('items.')->group(function(){
        Route::get('/','show')->name('view');
        Route::post('/store','store')->name('store');
        Route::delete('/delete/{product}','delete')->name('delete');
        Route::get('/edit/{product}','edit')->name('edit');
        Route::post('/update/{product}','update')->name('update');

    });
});


Route::group(['prefix'=>'/category','controller'=>CategoryController::class],function(){
    Route::name('category.')->group(function(){
        Route::get('/','index')->name('view');
        Route::post('/store','store')->name('store');
        Route::get('/edit/{category}','show')->name('show');
        Route::post('/delete/{category}','delete')->name('delete');
        Route::post('/update/{category}','update')->name('update');
    });

});










