<?php



Route::post('add-category', 'Admin\CategoryController@add_category');
Route::post('update-category', 'Admin\CategoryController@update_category');
Route::get('all-category', 'Admin\CategoryController@all_category');
Route::get('delete-category/{slug}', 'Admin\CategoryController@delete_category');
Route::get('edit-category/{slug}', 'Admin\CategoryController@edit_category');

Route::get('/{path}', function () {
    return view('admin.admin_layout');
});
Route::get('/{path}/{slug}', function () {
    return view('admin.admin_layout');
});
