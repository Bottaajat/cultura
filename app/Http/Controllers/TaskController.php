<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use DB;

use App\Http\Requests;

use App\Models\Task;

use App\Models\Exercise;

use App\Models\Ordering;

use App\Models\MultipleChoice;

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

	private function orderingData($task) {
		$droppables = array_pluck($task->orderings, 'droppable');
		$draggables = array_pluck($task->orderings, 'draggable');
		$showables = array_pluck($task->orderings, 'showable');
		return ['task' => $task, 'draggables' => $draggables,
		        'droppables' => $droppables,'showables' => $showables];
	}

	private function crosswordData($task) {
		$answers = array_pluck($task->crosswords, 'answer');
		$clues = array_pluck($task->crosswords, 'clue');
		$positions = array_pluck($task->crosswords, 'position');
		$orientations = array_pluck($task->crosswords, 'orientation');
		return ['task' => $task, 'answers' => $answers, 'clues' => $clues,
		        'positions' => $positions, 'orientations' => $orientations];
	}

	public function show($id) {
		if($task = Task::findOrFail($id)) {
			if($task->type=="Sanojen yhdistäminen" || $task->type=="Kuvien yhdistäminen") {
				return view('task.show', $this->orderingData($task));
			} elseif($task->type=='Monivalinta') {
				return view('task.show', array('task' => $task));
			} elseif($task->type=='Täyttö') {
				$text = $task->filling->text;
				return view('task.show', array('task' => $task, 'text' => $text ));
			} elseif($task->type=='Sanaristikko') {
				return view('task.show', $this->crosswordData($task));
			} else {
				return view('errors.404');
			}
		} else {
			return view('errors.404');
		}
	}

	public function store(Request $request)
    {
		$exercise_id = $request->input('exercise_id');
		$task = new Task;
		$task->name = $request->input('name');
		$task->type = $request->input('task_type');
		$task->exercise_id = $request->input('exercise_id');
		$task->assignment = $request->input('assignment');
		$task->exercise()->associate($exercise_id);
		$task->save();
		$task_id = $task->id;
		if ($request->input('task_type') == 'Sanojen yhdistäminen') $this->store_ordering_words($request, $task_id);	//DUPLIKAATIT DRAGGABLE JA DROPPABLEISSA AIHEUTTTAVAT ONGELMIA
		if ($request->input('task_type') == 'Kuvien yhdistäminen') $this->store_ordering_images($request, $task_id);	//DUPLIKAATIT DRAGGABLE JA DROPPABLEISSA AIHEUTTTAVAT ONGELMIA
		if ($request->input('task_type') == 'Monivalinta') $this->store_multipleChoice($request, $task_id);
		if ($request->input('task_type') == 'Sanaristikko') $this->store_crossword($request, $task_id);
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
			$file = $droppable;
			$extension = $file->getClientOriginalExtension();

			$extensionOk = $this->checkExtension($extension);
			if($extensionOk == true) {
				$filename = rand(11111,99999).'.'.$extension;
				$file->move($destinationPath, $filename);
				$droppables[$count] = $filename;
			}
			else {
				$droppables[$count] = 'no img';
				//ILMOITUS VIRHEESTÄ
			}
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
		return false;
	}

	public function store_multipleChoice(Request $request, $task_id)
	{
		$count = 0;
		foreach ($request->input('questions') as $question) {
			$questions[$count] = $question;
			$count++;
		}
		$count = 0;
		foreach ($request->input('choices') as $choice) {
			$choices[$count] = $choice;
			$count++;
		}
		$count = 0;
		foreach ($request->input('solutions') as $solution) {
			$solutions[$count] = $solution;
			$count++;
		}
		for ($i = 0; $i < $count; $i++) {
			$multipleChoice = new multipleChoice;
			$multipleChoice->question = $questions[$i];
			$multipleChoice->choices = $choices[$i];
			$multipleChoice->solution = $solutions[$i];
			$multipleChoice->task_id = $task_id;
			$multipleChoice->task()->associate($task_id);
			$multipleChoice->save();
		}
	}
	
	public function store_crossword(Request $request, $task_id)
    {
		$count = 0;
		foreach ($request->input('words') as $word) {
			$words[$count] = $word;
			$orientations[$count] = 'horizontal';
			$count++;
		}
		$words[$count] = $request->input('vertical');
		$orientations[$count] = 'vertical';
		$count = 0;
		foreach ($request->input('clues') as $clue) {
			$clues[$count] = $clue;
			$count++;
		}
		$clues[$count] = $request->input('vertical_clue');
		$count = 0;
		foreach ($request->input('middles') as $middle) {
			$x =  1 - $middle;
			$start = $x.'.'.$count;
			$positions[$count] = $start;
			$count++;
		}
		$positions[$count] = '0.0';
		for ($i = 0; $i <= $count; $i++) {
			$crossword = new crossword;
			$crossword->answer = $words[$i];
			$crossword->clue = $clues[$i];
			$crossword->position = $positions[$i];
			$crossword->orientation = $orientations[$i];
			$crossword->task_id = $task_id;
			$crossword->task()->associate($task_id);
			$crossword->save();
		}
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
          return back()->withErrors('Et voi poistaa tätä tehtävää!');
        if(!Auth::user()->is_admin && Auth::user()->school->id != $task->exercise->school->id)
          return back()->withErrors('Et voi poistaa toisen koulun tehtäviä!');
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
