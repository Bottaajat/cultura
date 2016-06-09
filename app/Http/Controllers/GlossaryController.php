<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Glossary;

class GlossaryController extends Controller
{

  private function clearEmptyLines($str) {
    return preg_replace('/^[ \t]*[\r\n]+/m', '', $str);
  }
  
  private function checkLines($rus,$fin) {
    $countRus = count(stringToArray($rus));
    $countFin =  count(stringToArray($fin));
    return ($countRus == $countFin);
  }


  public function __construct() {
    $this->middleware('auth');
  }

  public function store(Request $request) {
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
    $glossary->delete();
    return back()->with('success', 'Sanasto poistettu!');
  }
  

}
