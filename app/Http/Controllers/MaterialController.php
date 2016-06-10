<?php

namespace App\Http\Controllers;

use File;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Material;

use App\Exercise;

class MaterialController extends Controller
{
  public function __construct() {
    parent::__construct();
    $this->middleware('auth');
  }

  // SALLITUT AUDIO TIEDOSTO FORMAATIT
  protected $audio = ['3gp', 'aa', 'aac', 'aax', 'act', 'aiff', 'amr', 'ape', 'au', 'awb', 'dct', 'dss', 'dvf',
            'flac', 'gsm', 'iklax', 'ivs', 'm4a', 'm4b', 'm4p', 'mmf', 'mp3', 'mpc', 'msv', 'ogg', 'oga',
            'ogv', 'ogx', 'spx', 'opus', 'wav', 'wma', 'wave', 'webm'];

  // SALLITUT KUVA TIEDOSTO FORMAATIT
  protected $image = ['jpg', 'jpeg', 'jpe', 'jif', 'jfif', 'jfi', 'gif', 'png', 'apng', 'svg', 'bmp', 'dib', 'ico', 'cur'];

  public function index() {
    $materials = Material::all();
    $exercise_list = Exercise::lists('name', 'id');
    return view('material.index', array('materials' => $materials, 'exercise_list' => $exercise_list ));
  }


  private function allowedExtension($extension, $array) {
    return in_array($extension, $array);
  }

  private function handleFiles(Request $request, $material) {
    if($request->hasFile('file')) {
      if($material->type == 'video' || $material->type == 'text') {
        return false;
      }

      $file = $request->file('file');
      $extension = $file->getClientOriginalExtension();

      if($material->type == "image") {
          if(!$this->allowedExtension($extension, $this->image)) return false;
          $res = "/img/";
      }
      if($material->type == "audio") {
        if(!$this->allowedExtension($extension, $this->audio)) return false;
        $res = "/audio/";
      }

      if(strlen($material->src) == 0) {
        $filename = rand(11111,99999).'.'.$extension;
      } else {
        $filename = basename($material->src);
      }

      $dst = public_path() . $res;
      $file->move($dst, $filename);
      $material->src = $res . $filename;
      return true;
    } else {
      if($material->type == "image" || $material->type == "audio")
        return false;
      return true;
    }
    return false;
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request) {
    $material = new Material();
    $material->label = $request->input('label');
    $material->contents = $request->input('contents');
    $material->type = $request->input('type');
    $material->exercise()->associate($request->input('exercise_id'));

    if(!$this->handleFiles($request, $material))
      return back()->withErrors('Virheellinen tiedostoformaatti!');

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
    File::delete(public_path() . $material->src);
    $material->delete();
    return back()->with('success', 'Materiaali poistettu!');
  }
}
