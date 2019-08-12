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
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
	View::addExtension('html', 'php');
    return view::make('welcome');
});

Auth::routes();

Route::get('/confirm/{id}/{token}', 'Auth\RegisterController@confirm') ;

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


Route::get('/admin', 'adminController@index')->name('admin');
Route::get('/table', 'TableController@index')->name('table');

Route::post('/insert', 'adminController@insert')->name('insert');
Route::get('/confirm/{id}/{token}', 'Auth\RegisterController@confirm');

Route::get('/user', 'UserController@index')->name('user');

Route::group(['prefix' => ''] , function(){
	Route::resource('/users', 'Admin_modController');
});

Route::get('/data', 'dataController@Database')->name('data');
