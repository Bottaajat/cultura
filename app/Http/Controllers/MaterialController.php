<?php

namespace App\Http\Controllers;

use File, Auth;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Material;

use App\Models\Exercise;

class MaterialController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
  }

  // SALLITUT AUDIO TIEDOSTO FORMAATIT
  protected $audio = ['3gp', 'aa', 'aac', 'aax', 'act', 'aiff', 'amr', 'ape', 'au', 'awb', 'dct', 'dss', 'dvf',
            'flac', 'gsm', 'iklax', 'ivs', 'm4a', 'm4b', 'm4p', 'mmf', 'mp3', 'mpc', 'msv', 'ogg', 'oga',
            'ogv', 'ogx', 'spx', 'opus', 'wav', 'wma', 'wave', 'webm'];

  // SALLITUT KUVA TIEDOSTO FORMAATIT
  protected $image = ['jpg', 'jpeg', 'jpe', 'jif', 'jfif', 'jfi', 'gif', 'png', 'apng', 'svg', 'bmp', 'dib', 'ico', 'cur'];

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
      return view('material.index', array('materials' => $materials, 'exercise_list' => $exercise_list, 'search' => $search));
    }
    else
      $materials = Material::paginate(10);
      
    return view('material.index', array('materials' => $materials, 'exercise_list' => $exercise_list ));
  }


  private function allowedExtension($extension, $array) {
    return in_array($extension, $array);
  }


  private function handleFiles(Request $request, $material) {
    if($request->hasFile('file')) {
      $extension = $request->file('file')->getClientOriginalExtension();

      if($material->type == "image") {
        if(!$this->allowedExtension($extension, $this->image)) return false;
        else return handleFile($request, $material, public_path() . "/img/");
      } elseif ($material->type == "audio") {
        if(!$this->allowedExtension($extension, $this->audio)) return false;
        else return handleFile($request, $material, public_path() . "/audio/");
      } else {
        return false;
      }
    } return false;
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request) {
    $exercise = Exercise::find($request->input('exercise_id'));
    if(!Auth::user()->is_admin && $exercise->school == NULL)
      return back()->withErrors('Et voi lisätä tälle harjoitukselle materiaalia!');
    if(!Auth::user()->is_admin && Auth::user()->school->id != $exercise->school->id)
      return back()->withErrors('Et voi lisätä tälle harjoitukselle materiaalia!');

    $material = new Material();
    $material->label = $request->input('label');
    $material->contents = $request->input('contents');
    $material->type = $request->input('type');
    $material->exercise()->associate($request->input('exercise_id'));

    if(!$this->handleFiles($request, $material))
      return back()->withErrors('Vain kuva ja äänitiedostot ovat sallittuja!');

    $material->save();
    return back()->with('success', 'Materiaali lisätty!');
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
    if(!Auth::user()->is_admin && $exercise->school == NULL)
      return back()->withErrors('Et voi päivittää tätä materiaalia!');
    if(!Auth::user()->is_admin && Auth::user()->school->id != $exercise->school->id)
      return back()->withErrors('Et voi päivittää tätä materiaalia!');

    $material->label = $request->input('label');
    $material->contents = $request->input('content');
    $material->type = $request->input('type');

    if(!$this->handleFiles($request, $material))
      return back()->withErrors('Virheellinen tiedostoformaatti!');

    $material->save();
    return back()->with('success', 'Materiaali päivitetty!');
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
    if(!Auth::user()->is_admin && $exercise->school == NULL)
      return back()->withErrors('Et voi poistaa tätä materiaalia!');
    if(!Auth::user()->is_admin && Auth::user()->school->id != $exercise->school->id)
      return back()->withErrors('Et voi poistaa tätä materiaalia!');

    File::delete(public_path() . $material->src);
    $material->delete();
    return back()->with('success', 'Materiaali poistettu!');
  }
}
