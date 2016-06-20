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

  public function update(Request $request, $id) {
    $user = User::find($id);
    $user->firstname = $request->input('firstname');
    $user->lastname = $request->input('lastname');
    $user->email = $request->input('email');
    $user->phone = $request->input('phone');
    $user->intro = $request->input('intro');
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

  public function addPic(Request $request, $id) {
    if($request->hasFile('file')) {

    }
    return back()->withError('Tapahtui virhe!');
  }
}
