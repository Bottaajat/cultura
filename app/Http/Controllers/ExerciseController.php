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
}
