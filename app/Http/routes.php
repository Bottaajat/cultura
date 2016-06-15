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
Route::auth();

Route::get('/','TopicController@index');

//Resource:
/* Verb      | Path                | Action  | Route Name       */
/*==============================================================*/
/* GET       | /resource           | index   | resource.index   */
/* GET       | /resource/create    | create  | resource.create  */
/* POST      | /resource           | store   | resource.store   */
/* GET 	     | /resource/{id} 	   | show 	 | resource.show    */
/* GET 	     | /resource/{id}/edit | edit 	 | resource.edit    */
/* PUT/PATCH | /resource/{id} 	   | update  | resource.update  */
/* DELETE 	 | /resource/{id} 	   | destroy | resource.destroy */


Route::resource('school', 'SchoolController', ['except' => ['edit', 'create']]);

Route::resource('user', 'UserController', ['except' => ['edit', 'create', 'store']]);

Route::resource('exercise', 'ExerciseController', ['except' => ['edit', 'create']]);

Route::resource('material', 'MaterialController', ['except' => ['edit', 'create', 'show']]);

Route::resource('description', 'DescriptionController', ['only'=> ['store', 'update', 'destroy']]);

Route::resource('glossary', 'GlossaryController', ['only'=> ['store', 'update', 'destroy']]);

Route::resource('task', 'TaskController',
	array('only'=> array('index', 'show', 'store', /*'update',*/ 'destroy')));

//Custom Routes
Route::get('{topic}/{exercise}', 'ExerciseController@showActual');

Route::get('{topic}/{exercise}/{task}', 'TaskController@show');
