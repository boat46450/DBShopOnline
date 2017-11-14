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
    Route::get('/', 'ProductController@index');
    Route::get('/popular', 'ProductController@popular');

    Route::prefix('/login')->group(function() {
        Route::get('/', 'LoginController@index');
        Route::post('/', 'LoginController@login');
    });
    Route::get('/logout', 'LoginController@logout');

    Route::prefix('/register')->group(function() {
        Route::get('/', 'LoginController@register');
        Route::post('/', 'LoginController@submitRe');
    });

    Route::prefix('/profile')->group(function() {
        Route::get('/', 'CustomerController@index');
        Route::get('/edit', 'CustomerController@profile');
        Route::post('/edit', 'CustomerController@edit');
    });

    Route::prefix('/product')->group(function() {
        Route::get('/{id}', 'ProductController@product');
    });
});
