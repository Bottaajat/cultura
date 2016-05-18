<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Task;

//use App\Exercise;

//use App\ExerciseLevel;

class TaskController extends Controller
{
    public function show($level, $exercise, $task)
	{
		$task_ = Task::where('name', $task)->first();
		return view('task.show', array('task' => $task_));
	}
}
