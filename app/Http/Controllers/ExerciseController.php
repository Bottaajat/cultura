<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Exercise;

use App\Topic;

class ExerciseController extends Controller
{


	/**
     * Display a listing of the resource based on given $topic.
     * Otherwise display 404.
     *
     * @param string $topic
     * @return \Illuminate\Http\Response
     */
	public function list_exercises($topic) {
		if($topic_ = Topic::where('name', $topic)->first())
		{
			$exercises = $topic_->exercises;
			return view('exercise.list_exercises', array('exercises' => $exercises));
		}
		else return view('testi');
	}


	/**
     * Display the specified resource.
     *
     * @param  string  $topic, $name
     * @return \Illuminate\Http\Response
     */
	public function show($topic, $name) {
		$exercise = Exercise::where('name', $name)->first();
		return view('exercise.show', array('exercise' => $exercise));
	}



	// WORK IN PROGRESS!!!

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
    	$topics = Topic::all();
		$topic_names = $topics->pluck('name');
    	return view('exercise.create', array('topics' => $topic_names));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo "moi";
    }

}
