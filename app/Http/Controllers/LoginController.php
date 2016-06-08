<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
       * Create a new controller instance.
       *
       * @return void
       */
      public function __construct()
      {
          $this->middleware('auth');
      }
}
