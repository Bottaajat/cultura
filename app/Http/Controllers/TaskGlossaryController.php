<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\TaskGlossary;
use App\Models\Task;

use Auth, Validator;

class TaskGlossaryController extends Controller
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

  protected function validator(array $data) {
    return Validator::make($data, [
      'rus' => 'required|max:400',
      'fin' => 'required|max:400',
    ]);
  }

  public function store(Request $request) {
    $task = Task::find($request->input('task_id'));
    $exercise = $task->exercise;
    if(!Auth::user()->is_admin && $exercise->school == NULL)
      return back()->withErrors('Et voi luoda tälle tehtävälle sanastoa!');
    if(!Auth::user()->is_admin && Auth::user()->school->id != $exercise->school->id)
      return back()->withErrors('Et voi luoda tälle tehtävälle sanatoa!');

    $validate = $this->validator($request->all());
    if($validate->fails()) return back()->withErrors($validate);

    $taskgl = new TaskGlossary();
    $taskgl->rus = $this->clearEmptyLines($request->input('rus'));
    $taskgl->fin = $this->clearEmptyLines($request->input('fin'));
    $taskgl->task()->associate($request->input('task_id'));
    if ($this->checkLines($taskgl->rus,$taskgl->fin)) {
      $taskgl->save();
      return back()->with('success', 'Sanasto päivitetty!');
    } else {
      return back()->withErrors("Rivit eivät täsmää");
    }
  }

  public function update(Request $request, $id) {
    $taskgl = TaskGlossary::find($id);
    $exercise = $taskgl->task->exercise;
    if(!Auth::user()->is_admin && $exercise->school == NULL)
      return back()->withErrors('Et voi päivittää tätä sanastoa!');
    if(!Auth::user()->is_admin && Auth::user()->school->id != $exercise->school->id)
      return back()->withErrors('Et voi päivittää tätä sanastoa!');

    $validate = $this->validator($request->all());
    if($validate->fails()) return back()->withErrors($validate);

    $taskgl->rus = $this->clearEmptyLines($request->input('rus'));
    $taskgl->fin = $this->clearEmptyLines($request->input('fin'));
    if ($this->checkLines($taskgl->rus,$taskgl->fin)) {
      $taskgl->save();
      return back()->with('success', 'Sanasto päivitetty!');
    } else {
      return back()->withErrors("Rivit eivät täsmää");
    }
  }

  public function destroy($id) {
    $taskgl = TaskGlossary::find($id);
    $exercise = $taskgl->task->exercise;
    if(!Auth::user()->is_admin && $exercise->school == NULL)
      return back()->withErrors('Et voi poistaa tätä sanastoa!');
    if(!Auth::user()->is_admin && Auth::user()->school->id != $exercise->school->id)
      return back()->withErrors('Et voi poistaa tätä sanastoa!');

    $taskgl = TaskGlossary::find($id);
    $taskgl->delete();
    return back()->with('success', 'Sanasto poistettu!');
  }


}
