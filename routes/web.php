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

Route::get('categories', 'CategoryController@index')->name('categories');
Route::get('categories/{slug}', 'CategoryController@show')->name('categories.show');
