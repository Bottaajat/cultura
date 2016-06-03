<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Http\Requests;

use App\Task;

class TaskController extends Controller
{
    public function show($topic, $exercise, $task) {
		    $task_ = Task::where('name', $task)->first();
			  $contents = DB::table('orderings')->where('task_id', $task_['id'])->get();
        $srcs = array_pluck($task_->exercise->materials, 'src');
			  $i = 0;
			  foreach ($contents as $content) {
				      $draggables_[$i] = $content->draggable;
				      $droppables_[$i] = $content->droppable;
					  $showables_[$i] = $content->showable;
				      $i++;
			  }
		    return view('task.show', array('task' => $task_, 'draggables' => $draggables_, 'droppables' => $droppables_, 'showables' => $showables_, 'srcs' => $srcs));
	 }
}
