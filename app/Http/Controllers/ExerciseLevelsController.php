<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\ExerciseLevel;

class ExerciseLevelsController extends Controller
{
    public function index()
	{
    $levels = ExerciseLevel::all();
		return view('exerciselevels.index', array('levels' => $levels));
	}
	
	
	
	//Esimerkki funktio muuttujien välityksistä
	/*
	public function test($exerciselevel)
	{
    $level = ExerciseLevel::where('name',$exerciselevel)->first();
		if ($level == null) return view('index');
		else return view('testi', array('level' => $level));
	}
	*/
}
