<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Exercise;

class ExerciseController extends Controller
{
    public function index()
	{
		$exercises = Exercise::all();
		$levels = $exercises->getPossibleLevels();
		return view('exercise.index', array('levels', $levels));
	}
}
