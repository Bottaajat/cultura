<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Description;

class DescriptionController extends Controller
{

  public function store(Request $request) {
    $description = new description();
    $description->content = $request->input('content');
    $description->exercise()->associate($request->input('exercise_id'));
    $description->save();
    return back()->with('success', 'Kuvaus luotu!');
  }

  public function update(Request $request, $id) {
    $description = description::find($id);
    $description->content = $request->input('content'); 
    $description->save();
    return back()->with('success', 'Kuvaus päivitetty!');
  }

  public function destroy($id) {
    $description = description::find($id);
    $description->delete();
    return back()->with('success', 'Kuvaus poistettu!');
  }
  
}
