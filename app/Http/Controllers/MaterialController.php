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
      return view('material.index', array('materials' => $materials, 'exercise_list' => $exercise_list, 'search' => $search));
    }
    else
      $materials = Material::paginate(10);

    return view('material.index', array('materials' => $materials, 'exercise_list' => $exercise_list ));
  }

  private function handleFiles(Request $request, $material) {
    if($request->hasFile('file')) {
      $extension = $request->file('file')->getClientOriginalExtension();

      if($material->type == "image") {
        if(!allowedExtension($extension, allowedImageExtensions())) return false;
        else return handleFile($request, $material, public_path() . "/img/");
      } elseif ($material->type == "audio") {
        if(!allowedExtension($extension, allowedAudioExtensions())) return false;
        else return handleFile($request, $material, public_path() . "/audio/");
      } else {
        return false;
      }
    } elseif ($material->type == "text") {
      return true;
    }return false;
  }

  protected function validator(array $data) {
    return Validator::make($data, [
      'label' => 'required|max:255',
      'contents' => 'max:1000',
    ]);
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

    $validate = $this->validator($request->all());
    if($validate->fails()) return back()->withErrors($validate);

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

    $validate = $this->validator($request->all());
    if($validate->fails()) return back()->withErrors($validate);

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

    $material->glossary->delete();

    File::delete(public_path() . $material->src);
    $material->delete();
    return back()->with('success', 'Materiaali poistettu!');
  }
}
