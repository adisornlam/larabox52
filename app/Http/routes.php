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
Route::get('/phpinfo', function () {
    return phpinfo();
});

Route::auth();

Route::group(['prefix'=>'admin','middleware' => 'auth'], function () {
    Route::get('/', 'Backend\DashboardController@index');
    Route::resource('/users','Backend\UserController');
    Route::get('/phpinfo', 'HomeController@phpinfo');
});

Route::auth();

Route::get('/home', 'HomeController@index');
