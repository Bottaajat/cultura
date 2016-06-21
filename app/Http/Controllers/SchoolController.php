<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\School;
use App\Models\User;

use Auth, File;

class SchoolController extends Controller
{
  public function __construct() {
    $this->middleware('auth', ['except' => ['index', 'show']]);
    $this->middleware('school.crud', ['except' => ['index', 'show', 'apply', 'accept']]);
  }

  public function index() {
    $Schools = School::all();
    $school_list = School::lists('name', 'id');
    return view('school.index', array('schools' => $Schools,'school_list' => $school_list));
  }

  public function show($id) {
    return view('school.show', ['school' => School::findOrFail($id), 'pending' => User::where('pending', $id)->get()]);
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
    $school = School::find($id);
    if($school->src != NULL) {
      File::delete(public_path() . $school->src);
    }
    $school->delete();
    return back()->with('success', 'Koulu poistettu!');
  }

  public function apply($schoolid, $userid) {
    $user = User::findOrFail($userid);
    if(Auth::user()->pending != NULL) return back()->withErrors('Edellinen jäsenpyyntösi on vielä käsittelemättä!');
    if(Auth::user()->school != NULL) return back()->withErrors('Olet jo koulun ' . $user->school->name . ' jäsen!');

    $school = School::findOrFail($schoolid);

    $user->pending = $school->id;
    $user->save();

    return back()->with('success', $user->name() . ', jäsenyyspyyntösi on merkitty!');
  }

  public function accept($schoolid, $userid) {
    $user = User::findOrFail($userid);
    if(!Auth::user()->is_admin && Auth::user()->school->id != $schoolid)
      return back()->withErrors('Sinulla ei ole oikeuksia tähän toimintoon!');

    $school = School::findOrFail($schoolid);

    $user->pending = NULL;
    $user->school()->associate($school->id);
    $user->save();

    return back()->with('success', 'Käyttäjä ' . $user->name() . ' lisätty koulun ' . $school->name . ' jäseneksi.');
  }

  public function addLogo(Request $request, $id) {
    if(!Auth::user()->is_admin)
      return back()->withErrors('Et voi lisätä koululle logoa.');
      if($request->hasFile('file')) {
        $extension = $request->file('file')->getClientOriginalExtension();
        if(allowedExtension($extension, allowedImageExtensions())) {
          $school = School::find($id);
          handleFile($request, $school, public_path() . "/img/logos");
          $school->save();
          return back()->with('success', 'Kuvan lisäys onnistui!');
        } else {
          return back()->withErrors('Tiedostoformaatti ei ole sallittu.');
        }
      }
      return back()->withErrors('Tiedosto puuttuu.');
  }

  public function delLogo($id) {
    if(!Auth::user()->is_admin)
      return back()->withErrors('Et voi poistaa koulun logoa!');
    $school = School::find($id);
    File::delete(public_path() . $school->src);
    $school->src = NULL;
    $school->save();
    return back()->with('success', 'Profiilikuva poistettu.');
  }

}
