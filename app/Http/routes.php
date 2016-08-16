<?php

//Route::get('usuarios', ['as' => 'welcome', 'uses' => 'UsersController@index' ]);

Route::get('/', function () {
	Auth::logout();
	return view('auth/login');
});


Route::get('logado', ['middleware' => 'auth', function() {
    return view('welcome');
}]);

Route::get('editarcadastro', ['middleware' => 'auth', function() {
    return view('auth/editcadastro');
}]);

// rotas de autenticação
Route::get('entrar', 'Auth\AuthController@getLogin');
Route::post('entrar', 'Auth\AuthController@postLogin');
Route::get('sair', 'Auth\AuthController@logout');

// rotas para registros
Route::get('registrar', 'Auth\AuthController@getRegister');
Route::post('registrar', 'Auth\AuthController@postRegister');

