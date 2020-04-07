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


Route::name('product.')->group(function(){
    Route::get('/', 'ProductController@index')->name('index');
    Route::get('/products/{filter}', 'ProductController@filter')->name('filter');

    Route::prefix('product')->group(function (){
        Route::get('/{id}', 'ProductController@show')->name('show');
        Route::post('/addToCart', 'ProductController@addToCart')->name('addToCart');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
