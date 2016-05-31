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


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
		$topic_id = $request->input('topic_id');

		//$topic = Topic::where('name', $topic_name)->first();
		//$topic_id = $topic->pluck('topic_id');
		/*
		Exercise::insert([
					['name' => $name, 'topic_id' => $topic_id]
				]);
		*/
		$exercise = new Exercise;
		$exercise->name = $request->input('name');
		$exercise->topic()->associate($topic_id);
		$exercise->save();

		return redirect('/')->with('success', 'Harjoitus lisätty');
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
      if (strlen($request->input('exercise_name')) < 4) {
        return back()->withErrors("Anna pidempi harjotusnimi!");
      }
      
      $exercise = Exercise::find($id);
      $exercise_name = $request->input('exercise_name');
      
      $topic_id = $request->input('topic_id');
      $topic = Topic::find($topic_id);

      $exercise->name = $exercise_name;
      $exercise->topic()->associate($topic);

      $exercise->update();

      return back()->with('success', 'Päivitys onnistui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $exercise = Exercise::find($id);
        $exercise->delete();
        return redirect('/')->with('success', 'Harjoitus poistettu!');
    }

}
