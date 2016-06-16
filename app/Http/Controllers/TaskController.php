<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Http\Requests;

use App\Models\Task;

use App\Models\Exercise;

use App\Models\Ordering;

use App\Models\Crossword;

use App\Models\Filling;

use Auth;

class TaskController extends Controller
{
	public function index() {
		$tasks = Task::all();
		$exercise_list = Exercise::lists('name', 'id');
		$type_list = Task::distinct('type')->pluck('type');
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
				$contents = DB::table('orderings')->where('task_id', $task_['id'])->get();
				$srcs = array_pluck($task_->exercise->materials, 'src');
				$assignment = array_pluck($task_->assignment, 'content');
				$i = 0;
				foreach ($contents as $content) {
					$draggables_[$i] = $content->draggable;
					$droppables_[$i] = $content->droppable;
					$showables_[$i] = $content->showable;
					$i++;
				}
				return view('task.show', array('task' => $task_,
				'draggables' => $draggables_, 'droppables' => $droppables_,
				'showables' => $showables_, 'srcs' => $srcs, 'assignment'=> $assignment));
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
				$text = DB::table('fillings')->where('task_id', $task_['id'])->value('text');
				return view('task.show', array('task' => $task_, 'text' => $text ));
			}
      } else return view('errors.404');
	 }
	 
	 public function store_ordering(Request $request)
    {
      
    }
	
	public function store_crossword(Request $request)
    {
      
    }
	
	public function store(Request $request)
    {
		$exercise_id = $request->input('exercise_id');
		$i = $request->input('task_type');
	
		$task = new Task;
		$task->name = $request->input('name');
		$task->type = $request->input('task_type');
		$task->exercise_id = $request->input('exercise_id');
		$task->exercise()->associate($exercise_id);
		$task->save();
		$task_id = $task->id;
		if ($request->input('task_type') == 'Täyttö') $this->store_filling($request, $task_id);
		return back()->with('success', 'Tehtävä lisätty');
    }
	
	public function store_filling(Request $request, $task_id)
    {
		$filling = new Filling;
		$filling->text = $request->input('text');
		$filling->task_id = $task_id;
		$filling->task()->associate($task_id);
		$filling->save();
    }
	
	public function destroy($id)
	{
        
    }
}
