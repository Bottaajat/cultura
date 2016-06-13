<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Description;
use App\Models\Exercise;

class DescriptionController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
  }

  public function store(Request $request) {
    $exercise = Exercise::find($request->input('exercise_id'));
    if(!Auth::user()->is_admin && $exercise->school == NULL)
      return back()->withErrors('Et voi luoda tälle harjoitukselle kuvausta!');
    if(!Auth::user()->is_admin && Auth::user()->school->id != $exercise->school->id)
      return back()->withErrors('Et voi luoda tälle harjoitukselle kuvausta!');

    $description = new description();
    $description->content = $request->input('content');
    $description->exercise()->associate($request->input('exercise_id'));
    $description->save();
    return back()->with('success', 'Kuvaus luotu!');
  }

  public function update(Request $request, $id) {
    $description = description::find($id);
    $exercise = $description->exercise;
    if(!Auth::user()->is_admin && $exercise->school == NULL)
      return back()->withErrors('Et voi päivittää tätä kuvausta!');
    if(!Auth::user()->is_admin && Auth::user()->school->id != $exercise->school->id)
      return back()->withErrors('Et voi päivittää tätä kuvausta!');

    $description->content = $request->input('content');
    $description->save();
    return back()->with('success', 'Kuvaus päivitetty!');
  }

  public function destroy($id) {
    $description = description::find($id);
    $exercise = $description->exercise;
    if(!Auth::user()->is_admin && $exercise->school == NULL)
      return back()->withErrors('Et voi poistaa tätä kuvausta!');
    if(!Auth::user()->is_admin && Auth::user()->school->id != $exercise->school->id)
      return back()->withErrors('Et voi poistaa tätä kuvausta!');

    $description->delete();
    return back()->with('success', 'Kuvaus poistettu!');
  }

}
