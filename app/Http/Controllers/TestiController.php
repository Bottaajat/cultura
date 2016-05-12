<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TestiController extends Controller
{
    public function testi() {
      $asd = "kamaa";
      return view('test', array('kohta' => $asd));
   }
}
