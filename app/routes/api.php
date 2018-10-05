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

Route::post('new', 'UserController@register');
Route::post('login', 'UserController@authenticate');
Route::get('me', 'ApiController@show');
Route::put('me', 'ApiController@update');
Route::delete('me', 'ApiController@delete');