<?php

Route::get('/get-user', 'UserAuthController@get_user');

Route::get('/{path}', function () {
    return view('public.public_layout');
});
