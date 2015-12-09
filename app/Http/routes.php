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

Route::get('/', function () {
    return view('welcome');
});

//Authentication Routes for superuser

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');


//Protected routes

Route::get('/pixelbug/loggedin',[
	'middleware' => 'auth',
	'uses' => 'PagesController@logged'
	]);
Route::get('/pixelbug/loggedin/add', [
    'middleware' => 'auth',
    'uses' => 'PagesController@add'
]);
Route::post('/add', [
    'middleware' => 'auth',
    'uses' => 'PhotoController@create'
]);
Route::get('/pixelbug/loggedin/{album_name}',[
	'middleware' => 'auth',
	'uses' => 'PagesController@useralbum'
	]);
Route::get('/pixelbug/loggedin/{album_name}/{photo_id}',[
	'middleware' => 'auth',
	'uses' => 'PagesController@userphoto'
	]);
Route::get('/pixelbug/loggedin/{album_name}/{photo_id}/delete',[
	'middleware' => 'auth',
	'uses' => 'PhotoController@delete'
	]);



//Global routes

Route::get('/pixelbug','PagesController@homepage');
Route::get('/pixelbug/{album_name}','PagesController@viewalbum');
Route::get('/pixelbug/{album_name}/{photo_id}','PagesController@viewphoto');
