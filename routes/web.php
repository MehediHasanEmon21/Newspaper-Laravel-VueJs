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



Route::prefix('user')->group(base_path('routes/user.php'));
Route::prefix('admin')->group(base_path('routes/admin.php'));

Route::get('all-categories', 'HomeController@all_category');
Route::get('home-post', 'HomeController@home_post')->name('home');
Route::get('single-post/{slug}', 'HomeController@singlePost')->name('post.details');
Route::post('/add-comment', 'HomeController@add_comment');
Route::get('/all-comments/{slug}', 'HomeController@all_comment');
Route::get('/all-categories-post/{slug}', 'HomeController@all_categories_post');


Route::get('/', function () {
    return view('public.public_layout');
});

Route::get('/{path}', function () {
    return view('public.public_layout');
});
Route::get('/{path}/{slug}', function () {
    return view('public.public_layout');
});
