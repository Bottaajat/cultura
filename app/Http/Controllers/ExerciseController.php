<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Exercise;

use App\Models\Topic;

use Auth, Validator;

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
    if(Auth::check())
      $exercise_list = Exercise::when(Auth::check() && Auth::user()->school != NULL, 
        function ($query)  {
          return $query->Where('school_id', '=', Auth::user()->school->id);
        })
      ->lists('name', 'id');
    else
      $exercise_list = array();
    return view('exercise.show', array('exercise' => Exercise::findOrFail($id), 'exercise_list' => $exercise_list ));
  }

  protected function validator(array $data) {
    return Validator::make($data, [
      'name' => 'required|unique:exercises|min:4|max:255',
      'description' => 'min:3|max:1500',
      'topic_id' => 'required',
    ]);
  }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
      if (belongsToSchool(Auth::user())) {
        $validate = $this->validator($request->all());
        if($validate->fails()) return back()->withErrors($validate);

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
      return back()->withErrors('Sinun täytyy kuulua kouluun, jotta voit lisätä harjoituksen');
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
      $exercise = Exercise::find($id);

      if(!Auth::user()->is_admin && $exercise->school == NULL)
        return back()->withErrors('Vain admin voi päivittää tätä harjoitusta!');
      if(!Auth::user()->is_admin && Auth::user()->school->id != $exercise->school->id)
        return back()->withErrors('Et voi tehdä toisen koulun harjoitukseen muutoksia!');

      $validate = $this->validator($request->all());
      $exercise_name = $request->input('name');
      
      if($validate->fails()) {
        if (!$validate->errors()->has('name')) {
          return back()->withErrors($validate);
        } else if ($exercise_name !== $exercise->name) {
          return back()->withErrors($validate);
        }
      }

      $topic_id = $request->input('topic_id');
      $topic = Topic::find($topic_id);

      $exercise->name = $exercise_name;
      $exercise->topic()->associate($topic);
      $exercise->description = $request->input('description');

      if(Auth::user()->is_admin && $exercise->school != NULL) {
        $exercise->school()->dissociate($exercise->school());
      }
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
          return back()->withErrors('Vain admin voi poistaa tämän harjoituksen!');
        if(!Auth::user()->is_admin && Auth::user()->school->id != $exercise->school->id)
          return back()->withErrors('Et voi poistaa toisen koulun harjoituksia!');

        foreach($exercise->materials as $material) {
          $material->delete();
        }
        foreach($exercise->tasks as $task) {
          if (deleteTaskParts($task))
            $task->delete();
        }

        $exercise->delete();
        return redirect('/exercise')->with('success', 'Harjoitus poistettu!');
    }

}
