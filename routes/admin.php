<?php





Route::post('add-category', 'Admin\CategoryController@add_category');
Route::post('update-category', 'Admin\CategoryController@update_category');
Route::get('all-category', 'Admin\CategoryController@all_category');
Route::get('all-categories', 'Admin\CategoryController@all_categories');
Route::get('delete-category/{slug}', 'Admin\CategoryController@delete_category');
Route::get('edit-category/{slug}', 'Admin\CategoryController@edit_category');

//post route
Route::get('generate-slug', 'Admin\PostController@slug_generation');
Route::post('news-add', 'Admin\PostController@add_news');
Route::get('all-post', 'Admin\PostController@all_post');
Route::get('delete-post/{id}', 'Admin\PostController@deletePost');
Route::get('edit-post/{slug}', 'Admin\PostController@edit_post');
Route::post('post-update', 'Admin\PostController@update_post');

//ads route
Route::post('/ads-add', 'Admin\AdsController@add_ads');
Route::get('/all-ads', 'Admin\AdsController@all_ads');
Route::get('/delete-ads/{id}', 'Admin\AdsController@delete_ads');
Route::get('/edit-ads/{id}', 'Admin\AdsController@edit_ads');
Route::post('/ads-update', 'Admin\AdsController@update_ads');


//comments route
Route::get('/all-comments', 'Admin\AdsController@all_comments');
Route::get('/comment-delete/{id}', 'Admin\AdsController@comment_delete');

//comments route
Route::get('/all-users', 'Admin\AdsController@all_users');

Route::get('/search/news/{slug}', 'Admin\AdsController@search');
Route::post('breaking-news/add', 'Admin\AdsController@add_breaking_news');
Route::get('/breaking-posts', 'Admin\AdsController@all_breaking_news');
Route::get('/breaking-delete/{id}', 'Admin\AdsController@breaking_news_delete');

Route::get('/all-settings', 'Admin\AdsController@all_setting');



Route::get('/{path}', function () {
    return view('admin.admin_layout');
});
Route::get('/{path}/{slug}', function () {
    return view('admin.admin_layout');
});
