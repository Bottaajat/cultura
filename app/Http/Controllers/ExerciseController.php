<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Exercise;

use App\Topic;

class ExerciseController extends Controller
{
  public function __construct() {
    $this->middleware('auth', ['except' => ['index', 'show', 'showActual']]);
  }

  public function index() {
    $exercises = Exercise::all();
    $topic_list = Topic::lists('name', 'id');
    return view('exercise.index', array('exercises' => $exercises, 'topic_list'=> $topic_list));
  }

  /**
   * Display the specified resource.
   *
   * @param  string  $topic, $name
   * @return \Illuminate\Http\Response
   */
  public function show($id) {
    $exercise = Exercise::find($id);
  	return redirect($exercise->topic->name . "/" . $exercise->name);
  }

	public function showActual($topic, $name) {
        $exercise = Exercise::where('name', $name)->first();
				if($exercise != NULL && $exercise->topic->name == $topic)
            return view('exercise.show', array('exercise' => $exercise));
        return view('errors.404');
	}

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
			$topic_id = $request->input('topic_id');

			$exercise = new Exercise;
			$exercise->name = $request->input('name');
			$exercise->topic()->associate($topic_id);
			$exercise->save();

			return back()->with('success', 'Harjoitus lisätty');
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
