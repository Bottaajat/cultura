<?php

namespace App\Http\Controllers;

use File;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Material;

class MaterialController extends Controller
{

  public function index() {
    $materials = Material::all();
    return view('material.index', array('materials' => $materials));
  }

  private function handleFiles(Request $request, $material) {
    $src = "";
    if($request->hasFile('file')) {
      $file = $request->file('file');

      if(strlen($material->src) == 0) {
        $extension = $file->getClientOriginalExtension();
        $filename = rand(11111,99999).'.'.$extension;
      } else {
        $filename = basename($material->src);
      }

      if($material->type == "image") {
          $res = "/img/";
          $dst = public_path() . $res;
      }
      if($material->type == "audio") {
          $res = "/audio/";
          $dst = public_path() . $res;
      }
      $file->move($dst, $filename);
      $src = $res . $filename;
    }
    return $src;
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


    if( $material->type == "image" || $material->type == "audio" ) {
      $material->src = handleFiles($request, $material);
    }

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
    $material->contents = $request->input('contents');
    $material->type = $request->input('type');

    if( $material->type == "image" || $material->type == "audio" ) {
      $material->src = handleFiles($request, $material);
    }

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
