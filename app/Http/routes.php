<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::get ('/',[
	'uses' => 'UserController@getHome',
	'as' => 'home'
]);

Route::get('guest/login',[
	'uses' => 'UserController@getLogin',
	'as'=>    'guest.login',
	'middleware' => 'guest'
]);


Route::post('/guest/signup',[
	'uses' => 'UserController@postSignup',
	'as' => 'guest.signup',
	'middleware' => 'guest'
]);


Route::get('/user_profile',[
	'uses' => 'UserController@getUserProfile',
	'as' => 'user.profile',
	'middleware' => ['auth','user']
]);


Route::get('/user/logout',[
	'uses' => 'UserController@getLogout',
	'as' => 'user.logout',
	'middleware' => 'auth'
]);


Route::post('/guest/login',[
	'uses'=> 'UserController@postLogin',
	'as'  => 'guest.login',
	'middleware'=> 'guest'
]);

Route::get('/admin_profile',[
	'uses'=> 'UserController@getAdminProfile',
   	'as' => 'admin.profile',
   	'middleware' => ['auth','admin']
]);