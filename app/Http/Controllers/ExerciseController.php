<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Exercise;

class ExerciseController extends Controller
{
    public function index()
	{
		$levels = ExerciseLevel::all();
		return view('exerciselevels.index', array('levels' => $levels));
	}
	
	public function list_exercises($exerciselevel)
	{
		if ($exerciselevel == 1 || $exerciselevel == 2 || $exerciselevel == 3)
		{
			$exercise = Exercise::where('exercise_level_id',$exerciselevel)->get();
			return view('exercise_list', array('exercises' => $exercise));
		}
		else return view('testi');
	}
}
