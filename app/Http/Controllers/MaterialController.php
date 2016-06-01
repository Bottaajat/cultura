<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Material;

class MaterialController extends Controller
{

  public function index() {
    $materials = Material::all();
    return view('material.index', array('materials' => $materials));
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

    //filen käsittely
    //voisiko joku refaktoroida :,(
    if( $material->type == "image" || $material->type == "audio" ) {
      if($request->hasFile('file')) {
        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $filename = rand(11111,99999).'.'.$extension;

        if($material->type == "image") {
            $res = "/img/";
            $dst = public_path() . '/img';
        }
        if($material->type == "audio") {
            $res = "/audio/";
            $dst = public_path() . '/audio';
        }

        $material->src = $res . $filename;
        $file->move($dst, $filename);
      }
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
    return "asd";
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id) {
    $material = Material::find($id);
    $material->delete();
    return back()->with('success', 'Materiaali poistettu!');
  }
}
