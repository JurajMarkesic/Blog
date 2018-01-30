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

Route::get('/', 'PageController@index');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/search', 'SearchController@search');

Route::get('/posts/popular', 'PostsController@popular');
Route::get('/posts/recent', 'PostsController@recent');


Route::resource('posts', 'PostsController');


Route::get('/tags', 'TagController@index');

Route::post('/tags/store', 'TagController@store');

Route::post('/tags/attach', 'TagController@attach');

Route::delete('/tags/{tag}/delete', 'TagController@destroy');


Route::get('/categories', 'PageController@categories');

Route::get('/categories/all', 'CategoryController@index');

Route::get('/categories/{category}', 'CategoryController@show');

Route::post('/categories/store', 'CategoryController@store');

Route::delete('/categories/{category}/delete', 'CategoryController@destroy');


Route::post('/comments', 'CommentController@store');

Route::get('/comments/{post}', 'CommentController@show');

Route::delete('/comments/{comment}', 'CommentController@destroy');


Route::get('/logged', 'PageController@logged');