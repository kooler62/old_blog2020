<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['prefix' => 'v1', 'namespace' => 'Api\v1'], function () {
    Route::resource('authors', 'UserController')->only(['index', 'show']);
    Route::resource('categories', 'CategoryController')->only(['index', 'show']);
    Route::resource('posts', 'PostController')->only(['index', 'show']);
});

//TODO in post user_id user_name user_avatr
Route::group(['prefix' => 'v2', 'namespace' => 'Api\v2'], function () {
    Route::resource('authors', 'UserController')->only(['index', 'show']);
    Route::resource('categories', 'CategoryController')->only(['index', 'show']);
    Route::resource('posts', 'PostController')->only(['index', 'show']);
});

//TODO in post user.id user.name user.avatr json object/array
//Route::group(['prefix' => 'v3', 'namespace' => 'Api\v3'], function () {
//    Route::resource('authors', 'UserController')->only(['index', 'show']);
//    Route::resource('categories', 'CategoryController')->only(['index', 'show']);
//    Route::resource('posts', 'PostController')->only(['index', 'show']);
//});

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
