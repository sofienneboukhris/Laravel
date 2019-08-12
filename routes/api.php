<?php

use Illuminate\Http\Request;

Route::group([


     'middleware' => 'api'

], function () {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('sendPasswordResetLink', 'ResetPasswordController@sendEmail');
    Route::post('resetPassword', 'ChangePasswordController@process');
   


    Route::get('post', 'GetController@post');
    Route::get('get', 'GetController@get');
    Route::get('unique', 'GetController@unique');
});
