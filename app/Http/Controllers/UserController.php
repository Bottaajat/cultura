<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\User;
use App\Models\School;

use Auth, Hash;

class UserController extends Controller
{
  public function __construct() {
    $this->middleware('auth', ['except' => ['index','show']]);
  }

  public function index() {
    $users = User::all();
    $school_list = School::lists('name', 'id');
    return view('user.index', array('users' => $users,'school_list' => $school_list));
  }

  public function show($id) {
    $school_list = School::lists('name', 'id');
    return view('user.show', ['user' => User::findOrFail($id), 'school_list' => $school_list]);
  }

/* POISTA TÄMÄ!
  public function store(Request $request) {
    if(Auth::user()->is_admin) {
      $user = new User();
      $user->firstname = $request->input('firstname');
      $user->lastname = $request->input('lastname');
      $user->email = $request->input('email');
      $user->phone = $request->input('phone');
      $user->intro = $request->input('intro');
      $user->school()->associate($request->input('school_id'));
      $user->password = Hash::make($request->password);
      $user->save();
      return back()->with('success', 'Käyttäjä luotu!');
    }
    return back()->withErrors('Toiminto ei ole sallittu');
  } */

  public function update(Request $request, $id) {
    $user = User::find($id);
    $user->firstname = $request->input('firstname');
    $user->lastname = $request->input('lastname');
    $user->email = $request->input('email');
    $user->phone = $request->input('phone');
    $user->intro = $request->input('intro');
    $user->school()->associate($request->input('school_id'));

    $user->save();
    return back()->with('success', 'Käyttäjätiedot päivitetty!');
  }

  public function destroy($id) {
    $user = User::find($id);
    $user->delete();
    if(Auth::user()->id == $id)
      return redirect('logout')->with('success', 'Käyttäjä poistettu!');
    else
      return back()->with('success', 'Käyttäjä poistettu!');
  }

}
