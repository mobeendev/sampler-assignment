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


/*
  |--------------------------------------------------------------------------
  | Public API Routes
  |--------------------------------------------------------------------------
 */


Route::prefix('books')->group(function($router) {

        Route::get('/', 'BooksController@index');

        Route::get('/{id}', 'BooksController@show');

        Route::get('/lattest', 'BooksController@lattest');


        Route::prefix('search')->group(function($router) {
            Route::get('/title', 'BooksController@searchTitle');
            Route::get('/author', 'BooksController@searchAuthor');
            Route::get('/isbn/{isbn}', 'BooksController@searchISBN');
        });

});


Route::group(['middleware' => ['jwt.auth']], function() {

    Route::prefix('auth')->group(function($router) {
        Route::get('user', 'AuthController@user');
    });


    Route::prefix('books')->group(function($router) {

        Route::get('/{book}', 'BooksController@show');
        Route::put('/{book}', 'BooksController@update');

        Route::post('/', 'BooksController@store');


        Route::delete('/{book}', 'BooksController@delete');
    });
    
  

    Route::get('logout', 'AuthController@logout');
});
