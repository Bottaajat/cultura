<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\School;

class SchoolController extends Controller
{
  public function __construct() {
    $this->middleware('auth', ['except' => ['index', 'show']]);
    $this->middleware('school.crud', ['except' => ['index', 'show', 'apply']]);
  }

  public function index() {
    $Schools = School::all();
    $school_list = School::lists('name', 'id');
    return view('school.index', array('schools' => $Schools,'school_list' => $school_list));
  }

  public function show($id) {
    return view('school.show', ['school' => School::findOrFail($id)]);
  }

  public function store(Request $request) {
    $School = new School();
    $School->name = $request->input('name');

    $School->save();
    return back()->with('success', 'Koulu luotu!');
  }

  public function update(Request $request, $id) {
    $School = School::find($id);
    $School->name = $request->input('name');

    $School->save();
    return back()->with('success', 'Koulun tiedot päivitetty!');
  }

  public function destroy($id) {
    $School = School::find($id);
    $School->delete();
    return back()->with('success', 'Koulu poistettu!');
  }

  public function apply($id) {
    return back()->with('success', 'Jäsenyyspyyntö merkitty!');
  }

  public function accept($school, $user) {
    return back()->with('success', 'Käyttäjä ' . $user->name . ' lisätty koulun ' . $school->name . ' jäseneksi.');
  }

}
