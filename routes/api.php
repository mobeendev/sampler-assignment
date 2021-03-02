<?php
/*
  |--------------------------------------------------------------------------
  | API Routes
  |--------------------------------------------------------------------------
 */

Route::prefix('auth')->group(function($router) {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');    
});

Route::group(['middleware' => ['jwt.auth']], function() {

    Route::prefix('auth')->group(function($router) {
        Route::get('user', 'AuthController@user');
    });


    Route::prefix('books')->group(function($router) {
        Route::get('/', 'BooksController@index');

        Route::get('/{book}', 'BooksController@show');
        Route::put('/{book}', 'BooksController@update');

        Route::post('/', 'BooksController@store');


        Route::delete('/{book}', 'BooksController@delete');
    });
    
  

    Route::get('logout', 'AuthController@logout');
});
