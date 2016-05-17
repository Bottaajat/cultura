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

Route::get('/','ExerciseLevelsController@index');

// FEBJU lisää controllerin funktio!!!
Route::get('{exerciselevel}', 'ExerciseController@list_exercises');

Route::get('{exerciselevel}/{exercisename}', function($exerciselevel, $exercisename) {
	return view('exercise.show');
});

//Route::get('{exerciselevel}', 'ExerciseLevelsController@test');
