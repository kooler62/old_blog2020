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
Route::resource('users', 'Api\UserController')->only(['index', 'show']);
Route::resource('posts', 'Api\PostController')->only(['index', 'show']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
