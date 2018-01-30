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

Auth::routes();


Route::get('/', 'PageController@index');

Route::get('/posts/popular', 'PostsController@popular');

Route::get('/posts/recent', 'PostsController@recent');


Route::resource('posts', 'PostsController');


Route::prefix('/tags/')->group(function() {
    Route::get('', 'TagController@index');

    Route::post('/store', 'TagController@store');

    Route::post('attach', 'TagController@attach');

    Route::delete('{tag}/delete', 'TagController@destroy');
});


Route::prefix('/categories/')->group(function() {
    Route::get('', 'PageController@categories');

    Route::get('all', 'CategoryController@index');

    Route::get('{category}', 'CategoryController@show');

    Route::post('store', 'CategoryController@store');

    Route::delete('{category}/delete', 'CategoryController@destroy');
});


Route::prefix('/comments/')->group(function() {
    Route::post('', 'CommentController@store');

    Route::get('{post}', 'CommentController@show');

    Route::delete('{comment}', 'CommentController@destroy');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/search', 'SearchController@search');

Route::get('/logged', 'PageController@logged');