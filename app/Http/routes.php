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

//Authentication
Route::auth(['only' => ['login', 'logout']]);

Route::get('/','TopicController@index');

Route::resource('school', 'SchoolController',
	array('only' => array('index', 'store', 'update', 'destroy')));

Route::resource('user', 'UserController', ['except' => ['edit', 'create']]);

Route::resource('exercise', 'ExerciseController',
	array('only' => array('index', 'show','store', 'update', 'destroy')));

Route::resource('material', 'MaterialController',
	array('only'=> array('index', 'store', 'update', 'destroy')));

Route::resource('description', 'DescriptionController',
	array('only'=> array('store', 'update', 'destroy')));

Route::resource('glossary', 'GlossaryController',
	array('only'=> array('store', 'update', 'destroy')));


//Custom Routes
Route::get('{topic}/{exercise}', 'ExerciseController@showActual');

Route::get('{topic}/{exercise}/{task}', 'TaskController@show');
