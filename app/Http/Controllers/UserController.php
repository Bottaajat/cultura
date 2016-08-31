<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\User;
use App\Models\School;

use File, Auth;

class UserController extends Controller
{
  // SALLITUT KUVA TIEDOSTO FORMAATIT
  protected $image = ['jpg', 'jpeg', 'jpe', 'jif', 'jfif', 'jfi', 'gif', 'png', 'apng', 'svg', 'bmp', 'dib', 'ico', 'cur'];

  public function __construct() {
    $this->middleware('auth', ['except' => ['index','show']]);
  }

  public function index() {
    $users = User::where('is_admin', 0)->get();
    $school_list = School::lists('name', 'id');
    return view('user.index', array('users' => $users,'school_list' => $school_list));
  }

  public function show($id) {
    $user = User::findOrFail($id);
    if($user->is_admin)
      return view('errors.404');
    $school_list = School::lists('name', 'id');
    $school = $user->pending != NULL  ? School::find($user->pending) : NULL;
    $item = $user->pending != NULL ? $user : NULL;
    return view('user.show', ['user' => $user, 'school_list' => $school_list, 
          'school' => $school, 'item' => $item]);
  }

  public function update(Request $request, $id) {
    if(!Auth::user()->is_admin && !Auth::user()->id == $id)
      return back()->withErrors('Et voi muokata toisen profiilia!');
    $user = User::find($id);
    if($user->is_admin)
      return view('errors.404');

    $user->firstname = $request->input('firstname');
    $user->lastname = $request->input('lastname');
    $user->email = $request->input('email');
    $user->phone = $request->input('phone');
    $user->intro = $request->input('intro');
    $user->save();
    return back()->with('success', 'Käyttäjätiedot päivitetty!');
  }

  public function destroy($id) {
    if(!Auth::user()->is_admin && !Auth::user()->id == $id)
      return back()->withErrors('Et voi poistaa toisen profiilia!');
    $user = User::find($id);
    if($user->is_admin)
      return view('errors.404');
    if($user->src != NULL) {
      File::delete(public_path() . $user->src);
    }
    $user->delete();
    if(Auth::user()->id == $id)
      return redirect('logout')->with('success', 'Käyttäjä poistettu!');
    else
      return back()->with('success', 'Käyttäjä poistettu!');
  }

  public function addPic(Request $request, $id) {
    if(!Auth::user()->is_admin && !Auth::user()->id == $id)
      return back()->withErrors('Et voi vaihtaa toisen profiilikuvaa!');
    if($request->hasFile('file')) {
      $extension = $request->file('file')->getClientOriginalExtension();
      if(allowedExtension($extension, allowedImageExtensions())) {
        $user = User::find($id);
        handleFile($request, $user, public_path() . "/img/users");
        $user->save();
        return back()->with('success', 'Kuvan lisäys onnistui!');
      } else {
        return back()->withErrors('Tiedostoformaatti ei ole sallittu.');
      }
    }
    return back()->withErrors('Tiedosto puuttuu.');
  }

  public function delPic($id) {
    if(!Auth::user()->is_admin && !Auth::user()->id == $id)
      return back()->withErrors('Et voi poistaa toisen profiilikuvaa!');
    $user = User::find($id);
    File::delete(public_path() . $user->src);
    $user->src = NULL;
    $user->save();
    return back()->with('success', 'Profiilikuva poistettu.');
  }
}
