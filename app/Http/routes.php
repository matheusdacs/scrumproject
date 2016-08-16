<?php

Route::get('/', function () {
	return view('auth/login');
});

Route::get('logado', ['middleware' => 'auth', function() {
    return view('welcome');
}]);

// Authentication routes...
Route::get('entrar', 'Auth\AuthController@getLogin');
Route::post('entrar', 'Auth\AuthController@postLogin');
Route::get('sair', 'Auth\AuthController@logout');

// Registration routes...
Route::get('registrar', 'Auth\AuthController@getRegister');
Route::post('registrar', 'Auth\AuthController@postRegister');