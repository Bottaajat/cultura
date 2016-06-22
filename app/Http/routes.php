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

Route::post('school/{school}/apply/{user}', 'SchoolController@apply');
Route::post('school/{school}/accept/{user}', 'SchoolController@accept');
Route::post('school/{school}/reject/{user}', 'SchoolController@reject');
Route::resource('school', 'SchoolController', ['except' => ['edit', 'create']]);

Route::resource('user', 'UserController', ['except' => ['edit', 'create', 'store']]);


// Logo and user pic
Route::post('school/{school}/addLogo', 'SchoolController@addLogo');
Route::post('school/{school}/delLogo', 'SchoolController@delLogo');
Route::post('user/{user}/addPic', 'UserController@addPic');
Route::post('user/{user}/delPic', 'UserController@delPic');

// Video add
Route::post('task/{task}/addVid', 'TaskController@addVideo');
Route::post('task/{task}/delVid', 'TaskController@delVideo');


Route::resource('video', 'VideoController', ['except' => ['create', 'edit']]);

Route::resource('exercise', 'ExerciseController', ['except' => ['edit', 'create']]);

Route::get('search', 'MaterialController@index');
Route::resource('material', 'MaterialController', ['except' => ['edit', 'create', 'show']]);

Route::resource('glossary', 'GlossaryController', ['only'=> ['store', 'update', 'destroy']]);
Route::resource('taskglossary', 'TaskGlossaryController', ['only'=> ['store', 'update', 'destroy']]);

Route::resource('task', 'TaskController', ['except' => ['edit', 'create']]);
