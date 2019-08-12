<?php
Route::get('/', function () {
    return view('backoffice');
});
Route::post('/login/custom',[
	'uses' => 'LoginController@login',
	'as' => 'login.custom'
]);

Route::group(['middleware' => 'auth'],function(){
	Route::get('/admin',function(){
		return view('admins/admin');
	})->name('admin');;
	Route::get('/user',function(){
		return view('users/user');
	})->name('user');;
});
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/admin', 'adminController@index')->name('admin');
Route::get('/table', 'TableController@index')->name('table');
Route::post('/insert', 'adminController@insert')->name('insert');
Route::get('/confirm/{id}/{token}', 'Auth\RegisterController@confirm');
Route::get('/user', 'UserController@index')->name('user');
Route::get('/confirm/{id}/{token}', 'Auth\RegisterController@confirm') ;
Route::get('/admin', 'adminController@index')->name('admin');
Route::get('/table', 'TableController@index')->name('table');
Route::post('/insert', 'adminController@insert')->name('insert');
Route::get('/confirm/{id}/{token}', 'Auth\RegisterController@confirm');
Route::resource('/users', 'Admin_modController');


Route::group(['prefix' => ''] , function(){
	Route::resource('/users', 'Admin_modController');

});
