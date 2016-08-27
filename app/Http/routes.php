<?php

Route::get('/', function () {
	Auth::logout();
	return view('auth/login');
});


/*Route::get('logado', ['middleware' => 'auth', function() {
    return view('main');
}]);*/

Route::get('logado', [ 
    'as' => 'logado.index', 
    'middleware' => 'auth',
    'uses' => 'Main\Maincontroller@index'
]);

//------------------------routes related to edit users --------------------------------
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


//------------------------routes related to project--------------------------------

//New project - get
Route::get('project/new', [
	'as' => 'project.index', 
    'middleware' => 'auth',
    'uses' => 'project\ProjectController@index'
]);

//NewProject post
Route::post('project/new', [
	'as' => 'project.addproject', 
    'middleware' => 'auth',
    'uses' => 'project\ProjectController@addproject'
]);

//list projects
Route::get('project/list', [
	'as' => 'project.listProjects', 
    'middleware' => 'auth',
    'uses' => 'project\ProjectController@listProjects'
]);

//edit projects
Route::post('project/edit', [
    'as' => 'project.editprojects', 
    'middleware' => 'auth',
    'uses' => 'project\ProjectController@editprojects'
]);

//Delete projects
Route::get('project/delete/{id}', [
    'as' => 'project.deleteProject', 
    'middleware' => 'auth',
    'uses' => 'project\ProjectController@deleteProject'
]);


//------------------------routes related to project--------------------------------
// rotas de autenticação
Route::get('entrar', 'Auth\AuthController@getLogin');
Route::post('entrar', 'Auth\AuthController@postLogin');
Route::get('sair', 'Auth\AuthController@logout');

// rotas para registros
Route::get('registrar', 'Auth\AuthController@getRegister');
Route::post('registrar', 'Auth\AuthController@postRegister');

