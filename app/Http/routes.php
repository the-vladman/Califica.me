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
Route::get('becario/perfil', 'BecarioController@my_perfil');
Route::get('becario/perfil/edit', 'BecarioController@my_perfil_edit');
Route::patch('becario/perfil/edit/n', 'BecarioController@edit_n');
Route::patch('becario/perfil/edit/d', 'BecarioController@edit_d');
Route::patch('becario/perfil/edit/e', 'BecarioController@edit_e');
Route::patch('becario/perfil/edit/a', 'BecarioController@edit_a');
Route::patch('becario/perfil/edit/h', 'BecarioController@edit_h');

//LISTA BECARIOS
Route::get('becario/lista', 'BecarioController@list_becarios');
Route::get('becario/lista/{id}', 'BecarioController@show_becario');

//LISTA PROYECTOS
Route::get('becario/proyectos', 'BecarioController@list_proyectos');
Route::get('becario/proyectos/{id}', 'BecarioController@show_proyecto');
Route::get('becario/proyectos/{id}/edit', 'BecarioController@edit_proyecto');
Route::patch('becario/proyectos/{id}/edit/p', 'BecarioController@update_proyecto');
Route::patch('becario/proyectos/{id}/edit/r', 'BecarioController@subir_recursos');
