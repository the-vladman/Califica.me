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

Route::get('login', 'LoginController@login');
Route::get('olvide', 'LoginController@olvide');
Route::post('login', 'LoginController@acceso');
Route::get('logout', 'LoginController@logout');

// Registration routes...
Route::get('register', 'LoginController@registrar');
Route::post('register', 'LoginController@registrado');


//BECARIO
Route::get('becario/home', 'BecarioController@index');