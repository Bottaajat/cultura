<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Glossary;

class GlossaryController extends Controller
{

  public function store(Request $request) {
    $glossary = new Glossary();
    $glossary->rus = $request->input('rus');
    $glossary->fin = $request->input('fin');
    $glossary->material()->associate($request->input('material_id'));

    $glossary->save();
    return back()->with('success', 'Sanasto luotu!');
  }

  public function update(Request $request, $id) {
    $glossary = Glossary::find($id);
    $glossary->rus = $request->input('rus');
    $glossary->fin = $request->input('fin');
   
    $glossary->save();
    return back()->with('success', 'Sanasto päivitetty!');
  }

  public function destroy($id) {
    $glossary = Glossary::find($id);
    $glossary->delete();
    return back()->with('success', 'Sanasto poistettu!');
  }
  
}
