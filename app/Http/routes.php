<?php

Route::get('/', function () {
	Auth::logout();
	return view('auth/login');
});


Route::get('logado', ['middleware' => 'auth', function() {
    return view('welcome');
}]);

//Route::get('editarcadastro', ['as' => 'editarcadastro.index', 'uses' => 'Auth\EditUserController@index' ]);

Route::get('editarcadastro', [
	'as' => 'editarcadastro.index', 
    'middleware' => 'auth',
    'uses' => 'Auth\EditUserController@index'
]);

Route::post('editarcadastro', [ 
	'as' => 'editarcadastro.edituserLogged', 
    'middleware' => 'auth',
    'uses' => 'Auth\EditUserController@edituserLogged'
]);


// rotas de autenticação
Route::get('entrar', 'Auth\AuthController@getLogin');
Route::post('entrar', 'Auth\AuthController@postLogin');
Route::get('sair', 'Auth\AuthController@logout');

// rotas para registros
Route::get('registrar', 'Auth\AuthController@getRegister');
Route::post('registrar', 'Auth\AuthController@postRegister');

