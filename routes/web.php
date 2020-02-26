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

Route::group([ 'namespace' => 'Short', 'as' => 'short.'], function () {
    Route::resource('a', 'AuthorController', ['names' => 'authors'])->only(['index', 'show'])->parameters(['a' => 'author']);
    Route::resource('c', 'CategoryController', ['names' => 'categories'])->only(['index', 'show'])->parameters(['c' => 'category']);
    Route::resource('p', 'PostController', ['names' => 'posts'])->only(['index', 'show'])->parameters(['p' => 'post']);
});

Route::redirect('', 'posts')->name('home');
Route::resource('posts', 'PostController')->only(['index', 'show']);
//Route::resource('posts', 'PostController', ['parameters'=> ['posts' => 'slug']])->only(['index', 'show']);
Route::resource('categories', 'CategoryController')->only(['index', 'show']);
Route::resource('authors', 'AuthorController')->only(['index', 'show']);
