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



Route::group(['prefix' => 'user'], function ($router) {

    Route::post('login', 'UserAuthController@login');
    Route::post('logout', 'UserAuthController@logout');
    Route::post('refresh', 'UserAuthController@refresh');
    Route::post('me', 'UserAuthController@me');
});

Route::group(['prefix' => 'admin'], function ($router) {

    Route::post('login', 'AdminAuthController@login');
    Route::post('logout', 'AdminAuthController@logout');
    Route::post('refresh', 'AdminAuthController@refresh');
    Route::post('me', 'AdminAuthController@me');
});
