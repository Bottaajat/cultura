<?php

namespace App\Http\Controllers;

use File, Auth, Validator;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Material;
use App\Models\Exercise;

class MaterialController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
  }

  public function index(Request $request) {
    $exercise_list = Exercise::lists('name', 'id');
    $search = $request->input('search');
    if (strlen($search) > 0) {
      $materials = Material::Where('label', 'like', "%$search%")
        ->orWhere('type', "$search")
        ->orWhere('id', "$search")
        ->orWhereHas('exercise', function ($query) use ($search) {
            $query->where('name', 'like', "%$search%");
          })
        ->paginate(10)
        ->appends(['search' => $search]);
      return view('material.index', array('materials' => $materials,'exercise_list' => $exercise_list, 'search' => $search));
    }
    else
      $materials = Material::paginate(10);
      return view('material.index', array('materials' => $materials, 'exercise_list' => $exercise_list ));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request) {
    $exercise = Exercise::find($request->input('exercise_id'));    
    if ($this->checkPermissions($exercise)) {
      $validate = $this->validator($request->all());
      if($validate->fails()) return back()->withErrors($validate);

      $material = new Material();
      $material->label = $request->input('label');
      $material->contents = $request->input('contents');
      $material->type = $request->input('type');
      
      if (!$this->setExercise($request, $material)) {
        return back()->withErrors('Et voi muuttaa materiaalia harjoitukseen!');
      }
      if(!$this->handleFiles($request, $material)) {
        return back()->withErrors('Vain kuva ja äänitiedostot ovat sallittuja! (Valitse tyyppi)');
      }
      $material->save();
      return back()->with('success', 'Materiaali lisätty!');
    } else {
      return back()->withErrors('Et voi lisätä tälle harjoitukselle materiaalia!');
    }
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id) {
    $material = Material::find($id);
    $exercise = $material->exercise;
    if ($this->checkPermissions($exercise)) {
    
      $validate = $this->validator($request->all());
      if($validate->fails()) {
        return back()->withErrors($validate);
      }
      $material->label = $request->input('label');
      $material->contents = $request->input('content');

      if ($request->hasFile('file')) {
        if(!$this->handleFiles($request, $material)) {
          return back()->withErrors('Virheellinen tiedostoformaatti!');
        }
      } else if ($request->input('type') == "text" && $material->src) {
          File::delete(public_path() . $material->src);
      }
      
      $material->type = $request->input('type');
      
      if (!$this->setExercise($request, $material)) {
        return back()->withErrors('Et voi muuttaa materiaalia harjoitukseen!');
      }
      $material->save();
      return back()->with('success', 'Materiaali päivitetty!');
    } else {
      return back()->withErrors('Et voi päivittää tätä materiaalia!');
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id) {
    $material = Material::find($id);
    $exercise = $material->exercise;
    if ($this->checkPermissions($exercise)) {
      if ($material->glossary != null) { 
        $material->glossary->delete();
      }
      File::delete(public_path() . $material->src);
      $material->delete();
      return back()->with('success', 'Materiaali poistettu!');
    } else {
      return back()->withErrors('Et voi poistaa tätä materiaalia!')->withInput();
    }
  }
  
  
  // Tarkistaa että käyttäjä on kirjautunut ja että hänellä on oikeudet hallintaan
  private function checkPermissions($exercise) {
    if(!Auth::user()->is_admin && $exercise->school == NULL)
      return false;
    if(!Auth::user()->is_admin && Auth::user()->school->id != $exercise->school->id)
      return false;
    return true;
  }
  
  private function handleFiles(Request $request, $material) {

    if ($request->hasFile('file')) {
      $extension = $request->file('file')->getClientOriginalExtension();
      
      if ($request->input('type') == "image" 
                && allowedExtension($extension, allowedImageExtensions()))
          return handleFile($request, $material, public_path() . "/img/");
      
      if ($request->input('type') == "sound" 
                && allowedExtension($extension, allowedAudioExtensions()))
          return handleFile($request, $material, public_path() . "/audio/");
    }
    else if ($request->input('type') == "text") {
      return true;
    }
    return false;
  }
  
  // Tarkistaa että käyttäjä voi lisätä harjoitukseen materiaalia
  private function setExercise(Request $request, $material) {
    $new_exercise = Exercise::find($request->input('exercise_id'));
    if ($new_exercise != NULL && 
          checkMembership(Auth::user(), $new_exercise->school)) {
      $material->exercise()->associate($new_exercise->id);
      return true;
    } else {
      return false;
    }
  }
  
  protected function validator(array $data) {
    return Validator::make($data, [
      'label' => 'required|max:255',
      'contents' => 'max:1000',
    ]);
  }
}
