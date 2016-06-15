<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Glossary;
use App\Models\Material;

use Auth;

class GlossaryController extends Controller
{

  public function __construct() {
    $this->middleware('auth');
  }

  private function clearEmptyLines($str) {
    return preg_replace('/^[ \t]*[\r\n]+/m', '', $str);
  }

  private function checkLines($rus,$fin) {
    $countRus = count(stringToArray($rus));
    $countFin =  count(stringToArray($fin));
    return ($countRus == $countFin);
  }

  public function store(Request $request) {
    $material = Material::find($request->input('material_id'));
    $exercise = $material->exercise;
    if(!Auth::user()->is_admin && $exercise->school == NULL)
      return back()->withErrors('Et voi luoda tälle harjoitukselle sanastoa!');
    if(!Auth::user()->is_admin && Auth::user()->school->id != $exercise->school->id)
      return back()->withErrors('Et voi luoda tälle harjoitukselle sanatoa!');

    $glossary = new Glossary();
    $glossary->rus = $this->clearEmptyLines($request->input('rus'));
    $glossary->fin = $this->clearEmptyLines($request->input('fin'));
    $glossary->material()->associate($request->input('material_id'));
    if ($this->checkLines($glossary->rus,$glossary->fin)) {
      $glossary->save();
      return back()->with('success', 'Sanasto päivitetty!');
    } else {
      return back()->withErrors("Rivit eivät täsmää");
    }
  }

  public function update(Request $request, $id) {
    $glossary = Glossary::find($id);
    $exercise = $glossary->material->exercise;
    if(!Auth::user()->is_admin && $exercise->school == NULL)
      return back()->withErrors('Et voi päivittää tätä sanastoa!');
    if(!Auth::user()->is_admin && Auth::user()->school->id != $exercise->school->id)
      return back()->withErrors('Et voi päivittää tätä sanastoa!');

    $glossary->rus = $this->clearEmptyLines($request->input('rus'));
    $glossary->fin = $this->clearEmptyLines($request->input('fin'));
    if ($this->checkLines($glossary->rus,$glossary->fin)) {
      $glossary->save();
      return back()->with('success', 'Sanasto päivitetty!');
    } else {
      return back()->withErrors("Rivit eivät täsmää");
    }
  }

  public function destroy($id) {
    $glossary = Glossary::find($id);
    $exercise = $glossary->material->exercise;
    if(!Auth::user()->is_admin && $exercise->school == NULL)
      return back()->withErrors('Et voi poistaa tätä sanastoa!');
    if(!Auth::user()->is_admin && Auth::user()->school->id != $exercise->school->id)
      return back()->withErrors('Et voi poistaa tätä sanastoa!');

    $glossary = Glossary::find($id);
    $glossary->delete();
    return back()->with('success', 'Sanasto poistettu!');
  }


}
