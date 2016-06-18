<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use DB;

use App\Http\Requests;

use App\Models\Task;

use App\Models\Exercise;

use App\Models\Ordering;

use App\Models\Crossword;

use App\Models\Filling;

use File,Auth;

class TaskController extends Controller
{
	public function index() {
		$tasks = Task::all();
		$exercise_list = Exercise::lists('name', 'id');
		$type_list = ['Sanojen yhdistäminen','Kuvien yhdistäminen','Monivalinta','Sanaristikko','Täyttö'];
		$i=0;
		foreach($type_list as $type) {
			$types[$type_list[$i]] = $type_list[$i];
			$i++;
		}
		return view('task.index', array('tasks' => $tasks, 'exercise_list' => $exercise_list, 'type_list' => $types));
	}
	
	public function show($task_id) {
		$task = Task::find($task_id);
		//$exercise = Exercise::where('task_id', $task->id)
		//$topic = Topic::where('exercise_id', $exercise->id)
		return redirect($task->exercise->topic->name . "/" . $task->exercise->name . "/" . $task->name);
	}
	
    public function showActual($topic, $exercise, $task) {
		if($task_ = Task::where('name', $task)->first()) {
			if($task_->type=="Sanojen yhdistäminen" || $task_->type=="Kuvien yhdistäminen") {
				$droppables = array_pluck($task_->orderings, 'droppable');
				$draggables = array_pluck($task_->orderings, 'draggable');
				$showables = array_pluck($task_->orderings, 'showable');
				$srcs = array_pluck($task_->exercise->materials, 'src');
				return view('task.show', array('task' => $task_, 'draggables' => $draggables, 'droppables' => $droppables,'showables' => $showables, 'srcs' => $srcs));
			}

			if($task_->type=='Monivalinta') {
				return view('task.show', array('task' => $task_));
			}

			if($task_->type=='Sanaristikko') {
				$answers = array_pluck($task_->crosswords, 'answer');
				$clues = array_pluck($task_->crosswords, 'clue');
				$positions = array_pluck($task_->crosswords, 'position');
				$orientations = array_pluck($task_->crosswords, 'orientation');
				return view('task.show', array('task' => $task_, 'answers' => $answers, 'clues' => $clues, 'positions' => $positions, 'orientations' => $orientations));
			}

			if($task_->type=='Täyttö') {
				$text = $task_->filling->value('text');
				return view('task.show', array('task' => $task_, 'text' => $text ));
			}
      } else return view('errors.404');
	}
	
	public function store_crossword(Request $request)
    {
      
    }
	
	public function store(Request $request)
    {
		$exercise_id = $request->input('exercise_id');
		$task = new Task;
		$task->name = $request->input('name');
		$task->type = $request->input('task_type');
		$task->exercise_id = $request->input('exercise_id');
		$task->exercise()->associate($exercise_id);
		$task->save();
		$task_id = $task->id;
		if ($request->input('task_type') == 'Sanojen yhdistäminen') $this->store_ordering_words($request, $task_id);
		if ($request->input('task_type') == 'Kuvien yhdistäminen') $this->store_ordering_images($request, $task_id);
		if ($request->input('task_type') == 'Täyttö') $this->store_filling($request, $task_id);
		return back()->with('success', 'Tehtävä lisätty');
    }
	
	public function store_ordering_words(Request $request, $task_id)
    {
		$count = 0;
		foreach ($request->input('droppable') as $droppable) {
			$droppables[$count] = $droppable;
			$count++;
		}
		$count = 0;
		foreach ($request->input('draggable') as $draggable) {
			$draggables[$count] = $draggable;
			$count++;
		}
		$count = 0;
		foreach ($request->input('showable') as $showable) {
			$showables[$count] = $showable;
			$count++;
		}
		for ($i = 0; $i < $count; $i++) {
			$ordering = new Ordering;
			$ordering->droppable = $droppables[$i];
			$ordering->draggable = $draggables[$i];
			$ordering->showable = $showables[$i];
			$ordering->task_id = $task_id;
			$ordering->task()->associate($task_id);
			$ordering->save();
		}
    }
	
	public function store_ordering_images(Request $request, $task_id)
    {
		$destinationPath = public_path() . "/img/";
		$count = 0;
		foreach ($request->file('droppable') as $droppable) {
			$droppables[$count] = $droppable;
			$file = $droppable;
			$extension = $file->getClientOriginalExtension();
			
			if($this->checkExtension($extension) == false) return false;
	
			$filename = rand(11111,99999).'.'.$extension;
			$file->move($destinationPath, $filename);
			$droppables[$count] = $filename;
			$count++;
		}
		$count = 0;
		foreach ($request->input('draggable') as $draggable) {
			$draggables[$count] = $draggable;
			$count++;
		}
		for ($i = 0; $i < $count; $i++) {
			$ordering = new Ordering;
			$ordering->droppable = $droppables[$i];
			$ordering->draggable = $draggables[$i];
			$ordering->showable = 'img';
			$ordering->task_id = $task_id;
			$ordering->task()->associate($task_id);
			$ordering->save();
		}
    }
	
	private function checkExtension($extension) {
		$image = ['jpg', 'jpeg', 'jpe', 'jif', 'jfif', 'jfi', 'gif', 'png', 'apng', 'svg', 'bmp', 'dib', 'ico', 'cur'];
		for ($i = 0; $i < count($image); $i++ ) {
			if($extension == $image[$i]) return true;
		}
		return back()->withErrors('Tarkista tiedostoformaatti');
	}
	
	public function store_filling(Request $request, $task_id)
    {
		$filling = new Filling;
		$filling->text = $request->input('text');
		$filling->task_id = $task_id;
		$filling->task()->associate($task_id);
		$filling->save();
    }
	
	public function update(Request $request, $id)
    {
		return back()->with('success', 'Päivitys onnistui!');
    }
	
	public function destroy($id) {
        $task = Task::find($id);

        if(!Auth::user()->is_admin && $task->exercise->school == NULL)
          return back()->withErrors('Et voi poistaa tätä harjoitusta!');
        if(!Auth::user()->is_admin && Auth::user()->school->id != $task->exercise->school->id)
          return back()->withErrors('Et voi poistaa toisen koulun harjoituksia!');
		if($task->type == 'Sanojen yhdistäminen') {
			$orderings = $task->orderings;
			foreach($orderings as $ordering) {
				$ordering->delete();
			}
		}
		if($task->type == 'Kuvien yhdistäminen') {
			$orderings = $task->orderings;
			foreach($orderings as $ordering) {
				File::delete(public_path().'/img/'. $ordering->droppable);
				$ordering->delete();
			}
		}
		if($task->type == 'Monivalinta') {
			$multiplechoises = $task->multiplechoises;
			foreach($multiplechoises as $multiplechoice) {
				$multiplechoice->delete();
			}
		}
		if($task->type == 'Sanaristikko') {
			$crosswords = $task->crosswords;
			foreach($crosswords as $crossword) {
				$crossword->delete();
			}
		}
		if($task->type == 'Täyttö') {
			$filling = $task->filling;
			$filling->delete();
		}
		$task->delete();
        return redirect('/task')->with('success', 'Tehtävä poistettu!');
    }
}
