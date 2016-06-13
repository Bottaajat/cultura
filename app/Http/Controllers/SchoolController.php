<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\School;

class SchoolController extends Controller
{
  public function __construct() {
    parent::__construct();
    $this->middleware('auth');
  }

  public function index() {
    $Schools = School::all();
    $school_list = School::lists('name', 'id');
    return view('school.index', array('schools' => $Schools,'school_list' => $school_list));
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

}
