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



// These are open APIs to view/search books

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
        Route::post('logout', 'AuthController@logout');

    });
    

    // Checkin and Checkout Book
    Route::prefix('user/books')->group(function($router) {
        Route::get('/', 'UserController@index');
        Route::post('checkin', 'UserController@checkIn');
        Route::post('checkout', 'UserController@checkOut');
    });
    

    // Create Book
    Route::prefix('books')->group(function($router) {

        Route::post('/create', 'BooksController@store');
    });

});
