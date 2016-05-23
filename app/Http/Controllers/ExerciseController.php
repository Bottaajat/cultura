<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Exercise;

use App\Topic;

class ExerciseController extends Controller
{

	public function list_exercises($topic) {
		if($topic_ = Topic::where('name', $topic)->first())
		{
			$exercises = $topic_->exercises;
			return view('exercise.list_exercises', array('exercises' => $exercises));
		}
		else return view('testi');
	}

	public function show($topic, $name) {
		$exercise = Exercise::where('name', $name)->first();
		return view('exercise.show', array('exercise' => $exercise));
	}
}
