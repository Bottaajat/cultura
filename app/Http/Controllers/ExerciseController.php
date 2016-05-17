<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Exercise;

use App\ExerciseLevel;

class ExerciseController extends Controller
{

	public function list_exercises($exercise_level_name)
	{
		if ($exercise_level_name == 'alkeet' || $exercise_level_name == 'selviytyminen' || $exercise_level_name == 'ammatti')
		{
			$levels = ExerciseLevel::where('name', $exercise_level_name)->first();
			$exercises = $levels->exercises;
			return view('exercise_list', array('exercises' => $exercises));
			//$exercise = Exercise::where('exercise_level_id',$exerciselevel_id)->get();
			//return view('exercise_list', array('exercises' => $exercise));
		}
		else return view('testi');
	}
}
