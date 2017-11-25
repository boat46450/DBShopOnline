<?php

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

Route::prefix('/')->group(function () {

    // home
    Route::get('/', 'ProductController@index');
    Route::get('/popular', 'ProductController@popular');
    Route::post('/search', 'ProductController@search');
    Route::get('/cart', 'CustomerController@cart');

    // login
    Route::prefix('/login')->group(function() {
        Route::get('/', 'LoginController@index');
        Route::post('/', 'LoginController@login');
    });
    Route::get('/logout', 'LoginController@logout');

    Route::prefix('/register')->group(function() {
        Route::get('/', 'LoginController@register');
        Route::post('/', 'LoginController@submitRe');
    });

    // profile
    Route::prefix('/profile')->group(function() {
        Route::get('/', 'CustomerController@index');
        Route::get('/edit', 'CustomerController@profile');
        Route::post('/edit', 'CustomerController@edit');
        Route::get('/order', 'CustomerController@order');
    });

    // product
    Route::prefix('/product')->group(function() {
        Route::get('/{id}', 'ProductController@product');
        Route::post('/addCart', 'ProductController@addCart');
        Route::get('/{id}/edit', 'ShopController@proEdit');
    });

    // catalog
    Route::prefix('/catalog')->group(function() {
        Route::get('/', 'ProductController@catalogs');
        Route::get('/{id}', 'ProductController@catalog');
    });

    // brand
    Route::prefix('/brand')->group(function() {
        Route::get('/', 'ProductController@brands');
        Route::get('/{id}', 'ProductController@brand');
    });

    // shop
    Route::prefix('/shop')->group(function() {
        Route::get('/', 'ShopController@index');
        Route::get('/create', 'ShopController@create');
        Route::post('/create', 'ShopController@createSub');
        Route::get('/{id}', 'ShopController@shop');
        Route::get('/{id}/edit', 'ShopController@edit');
        Route::post('/{id}/edit', 'ShopController@editSub');
        Route::get('/{id}/add', 'ShopController@add');
        Route::post('/{id}/add', 'ShopController@addSub');
    });
});
