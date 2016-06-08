<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use Validator, Input, Auth, Redirect;
use App\User;

class AuthController extends Controller
{
  public function showLoginForm() {
    return view('auth.login');
  }

  public function login(Request $request) {
    $input = Input::all();
    $rules = array('email' => 'required', 'password' => 'required');
    $message = array('required' => 'Virheellinen syöte!');
    $validate = Validator::make($input, $rules, $message);

    if($validate->passes())
		{
			$credentials = array('email' => Input::get('email'), 'password' => Input::get('password'));
			if(Auth::attempt($credentials)){
        $user = User::where('email', '=',Input::get('email'))->first();
				return Redirect::to('/')->with('success', 'Tervetuloa ' . $user->firstname . " " . $user->lastname."!");
			} else {
				return Redirect::to('login')->withErrors('Sisäänkirjaantuminen epäonnistui!');
			}
		}

    return Redirect::to('/login')->withErrors($validate);
  }

  public function logout() {
    Auth::logout();
    return Redirect::to('/')->with('success', 'Uloskirjaantuminen onnistui!');
  }
}
