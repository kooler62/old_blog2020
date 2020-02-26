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

Route::get('', 'PostController@index')->name('home');
Route::get('posts/{slug}', 'PostController@show')->name('posts.show');

Route::redirect('', 'posts')->name('home');
Route::resource('posts', 'CategoryController')->only(['index', 'show']);
Route::resource('categories', 'CategoryController')->only(['index', 'show']);
Route::resource('authors', 'AuthorController')->only(['index', 'show']);
