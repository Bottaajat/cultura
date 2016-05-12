<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TestiController extends Controller
{
	public function test() {
		$testattava = "Kamaa";
		return view('test', array('kohta' => $testattava));	
	}
}
