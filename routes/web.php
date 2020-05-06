<?php

use Illuminate\Support\Facades\Route;

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

/**
 * Routes for Admin namespace.
 */
Route::namespace('Admin')->prefix('admin')->middleware('can:isAdmin')->name('admin.')->group(function (){
    Route::namespace('User')->prefix('user')->name('user.')->group(function (){
        Route::get('/', 'UserController@index')->name('index');
        Route::post('/role', 'UserController@storeRole')->name('role');
        Route::delete('/{user_id}', 'UserController@destroy')->name('delete');
    });
});

/**
 * Routes for order, cart and product pages.
 */
Route::name('product.')->group(function(){
    Route::get('/', 'ProductController@index')->name('index');
    Route::get('/products/{filter}', 'ProductController@filter')->name('filter');

    Route::prefix('cart')->group(function(){
        Route::get('/', 'ProductController@showCart')->name('cart');
        Route::post('/editCart', 'ProductController@editCart')->name('cart.edit');
        Route::namespace('Order')->middleware('auth')->group(function(){
            Route::get('/checkout', 'OrderController@create')->name('cart.checkout');
            Route::post('/pay', 'OrderController@store')->name('cart.pay');
        });
    });
    Route::prefix('product')->group(function (){
        Route::get('/{product_id}', 'ProductController@show')->name('show');
        Route::post('/addToCart', 'ProductController@addToCart')->name('addToCart');
    });
});

/**
 * Routes for order pages.
 */

Route::namespace('Order')->prefix('order')->name('order.')->middleware('auth')->group(function (){
    Route::get('/show', 'OrderController@show')->name('show');
    Route::middleware('can:isAdmin')->prefix('admin')->name('admin.')->group(function(){
        Route::get('/index/{filter}', 'OrderController@index')->name('index');
        Route::POST('/index/{filter}', 'OrderController@index')->name('index');
        Route::post('/update/{order_detail_id}/', 'OrderDetailController@update')->name('update');
    });

});

Auth::routes();
