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

Route::get('/','TopicController@index');

Route::resource('exercise', 'ExerciseController',
	array('only' => array('store', 'update', 'destroy')));

Route::resource('material', 'MaterialController',
	array('only'=> array('index', 'store', 'update', 'destroy')));

Route::resource('description', 'DescriptionController',
	array('only'=> array('store', 'update', 'destroy')));

Route::get('{topic}','ExerciseController@list_exercises');

Route::get('{topic}/{exercise}', 'ExerciseController@show');

Route::get('{topic}/{exercise}/{task}', 'TaskController@show');

//Route::get('{exerciselevel}', 'ExerciseLevelsController@test');
