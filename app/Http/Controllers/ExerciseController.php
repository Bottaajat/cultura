<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Exercise;

use App\ExerciseLevel;

class ExerciseController extends Controller
{

	public function list_exercises($exercise_level_name) {
		//if ($exercise_level_name == 'alkeet' || $exercise_level_name == 'selviytyminen' || $exercise_level_name == 'ammatti')
		if($levels = ExerciseLevel::where('name', $exercise_level_name)->first())
		{
			//$levels = ExerciseLevel::where('name', $exercise_level_name)->first();
			$exercises = $levels->exercises;
			return view('exercise.list_exercises', array('exercises' => $exercises));
		}
		else return view('testi');
	}

	public function show($level, $name) {
		$exercise = Exercise::where('name', $name)->first();
		return view('exercise.show', array('exercise' => $exercise));
	}
}
