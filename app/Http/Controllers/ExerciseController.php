<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Exercise;

use App\Models\Topic;

use Auth;

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
    return view('exercise.show', ['exercise' => Exercise::findOrFail($id)]);
  }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
      if (strlen($request->input('name')) < 4) {
        return back()->withErrors("Anna pidempi harjotusnimi!");
      }

      $topic_id = $request->input('topic_id');

      $exercise = new Exercise;
      $exercise->name = $request->input('name');
      $exercise->description = $request->input('description');
      $exercise->topic()->associate($topic_id);
      if(!Auth::user()->is_admin)
        $exercise->school()->associate(Auth::user()->school);
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

      if(!Auth::user()->is_admin && $exercise->school == NULL)
        return back()->withErrors('Et voi päivittää tätä harjoitusta!');
      if(!Auth::user()->is_admin && Auth::user()->school->id != $exercise->school->id)
        return back()->withErrors('Et voi tehdä toisen koulun harjoitukseen muutoksia!');

      $exercise_name = $request->input('exercise_name');

      $topic_id = $request->input('topic_id');
      $topic = Topic::find($topic_id);

      $exercise->name = $exercise_name;
      $exercise->topic()->associate($topic);
      $exercise->description = $request->input('description');

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

        if(!Auth::user()->is_admin && $exercise->school == NULL)
          return back()->withErrors('Et voi poistaa tätä harjoitusta!');
        if(!Auth::user()->is_admin && Auth::user()->school->id != $exercise->school->id)
          return back()->withErrors('Et voi poistaa toisen koulun harjoituksia!');

        $exercise->delete();
        return redirect('/exercise')->with('success', 'Harjoitus poistettu!');
    }

}
