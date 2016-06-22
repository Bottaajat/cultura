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
	public function __construct() {
		$this->middleware('auth', ['except' => ['index','show']]);
	}

	public function index(Request $request) {
		$tasks = Task::all();
		$exercise_list = Exercise::lists('name', 'id');
		$type_list = ['Sanojen yhdistäminen','Kuvien yhdistäminen','Monivalinta','Sanaristikko','Täyttö'];
		$i=0;
		foreach($type_list as $type) {
			$types[$type_list[$i]] = $type_list[$i];
			$i++;
		}
		
		$search = $request->input('search');
		if (strlen($search) > 0) {
		  $tasks = Task::Where('name', 'like', "%$search%")
			->orWhere('type', "$search")
			->orWhere('id', "$search")
			->orWhereHas('exercise', function ($query) use ($search) {
				$query->where('name', 'like', "%$search%");
			  })
			->paginate(10)
			->appends(['search' => $search]);
		  return view('task.index', array('tasks' => $tasks, 'exercise_list' => $exercise_list, 'type_list' => $types));
		}
		else $tasks = Task::paginate(10);
		
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
      $videos;
      if(Auth::user()->is_admin) {
        $videos = Video::all();
      } else {
        $videos = $task->school->video;
      }
      if($task->type=="Sanojen yhdistäminen" || $task->type=="Kuvien yhdistäminen") {
        return view('task.show', $this->orderingData($task, $videos));
      } elseif($task->type=='Monivalinta') {
        return view('task.show', array('task' => $task, 'videos' => $videos));
      } elseif($task->type=='Täyttö') {
        $text = $task->filling->text;
        return view('task.show', array('task' => $task, 'text' => $text,  'videos' => $videos ));
      } elseif($task->type=='Sanaristikko') {
        return view('task.show', $this->crosswordData($task,$videos));
      } else {
        return view('errors.404');
      }
    } else {
      return view('errors.404');
    }
  }
  
	public function store(Request $request)
    {
		$exercise = Task::find($request->input('exercise_id'));
		
		if(!Auth::user()->is_admin && $exercise->school == NULL)
			return back()->withErrors('Et voi lisätä tehtäviä tähän harjoitukseen!');
        if(!Auth::user()->is_admin && Auth::user()->school->id != $exercise->school->id)
			return back()->withErrors('Et voi tehdä lisätä tehtäviä toisen koulun harjoitukseen!');
		
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
		$all_in = true;
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
				$all_in = false;
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
		if ($all_in === false) return back()->withErrors( 'Kaikki kuvat eivät tallentuneet' );
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
			$crossword->answer = strtolower($words[$i]);
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
      $task = Task::find($id);

      if(!Auth::user()->is_admin && $task->exercise->school == NULL)
        return back()->withErrors('Et voi päivittää tätä tehtävää!');
      if(!Auth::user()->is_admin && Auth::user()->school->id != $task->exercise->school->id)
        return back()->withErrors('Et voi tehdä toisen koulun tehtävään muutoksia!');

      $task->name = $request->input('name');
	  $exercise = Exercise::find($request->input('exercise_id'));
	  $task->exercise()->associate($exercise);
	  $task->assignment = $request->input('assignment');

      $task->update();
	
	  if ($request->input('task_type') == 'Sanojen yhdistäminen') $this->edit_ordering_words($request, $id);
	  if ($request->input('task_type') == 'Kuvien yhdistäminen') $this->edit_ordering_images($request, $id);
	  if ($request->input('task_type') == 'Monivalinta') $this->edit_multipleChoice($request, $id);
	  if ($request->input('task_type') == 'Sanaristikko') $this->edit_crossword($request, $id);
	  if ($request->input('task_type') == 'Täyttö') $this->edit_filling($request, $id);

      return back()->with('success', 'Päivitys onnistui!');
    }
	
	public function edit_ordering_words(Request $request, $task_id)
    {
		$task = Task::find($task_id);
		
		//HAE SYÖTTEET
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
		
		//HAE TALLENNETUT OBJEKTIT
		$i=0;
		foreach ($task->orderings as $ordering) {
			$orderings[$i] = $ordering;
			$i++;
		}
		
		//SUORITA MUUTOKSET
		$ordering_count = 0;
		while ( $ordering_count < count($orderings)) {
			if ( $ordering_count < count($droppables) ) {
				$ordering = $orderings[$ordering_count];
				$ordering->droppable = $droppables[$ordering_count];
				$ordering->draggable = $draggables[$ordering_count];
				$ordering->showable = $showables[$ordering_count];
				$ordering->task_id = $task_id;
				$ordering->task()->associate($task_id);
				$ordering->update();
			}
			else {
				$orderings[$ordering_count]->delete();
			}
			$ordering_count++;
		}
		while ($ordering_count < count($droppables)) {
			$ordering = new Ordering;
			$ordering->droppable = $droppables[$ordering_count];
			$ordering->draggable = $draggables[$ordering_count];
			$ordering->showable = $showables[$ordering_count];
			$ordering->task_id = $task_id;
			$ordering->task()->associate($task_id);
			$ordering->save();
			$ordering_count++;
		}
    }

	public function edit_ordering_images(Request $request, $task_id)
    {
		$task = Task::find($task_id);
		$destinationPath = public_path() . "/img/";
		$all_in = true;
		
		//HAE TALLENNETUT OBJEKTIT
		$i=0;
		foreach ($task->orderings as $ordering) {
			$orderings[$i] = $ordering;
			$i++;
		}
		
		//HAE SYÖTTEET
		$count = 0;
		foreach ($request->file('droppable') as $droppable) {
			$file = $droppable;
			
			if ($file != null) {
				$extension = $file->getClientOriginalExtension();
				$extensionOk = $this->checkExtension($extension);
				if ($count < count($orderings)) {
					if ($orderings[$count]->droppable != null) {
						File::delete(public_path().'/img/'. $orderings[$count]->droppable);
					}
					if($extensionOk == true) {
						$filename = rand(11111,99999).'.'.$extension;
						$file->move($destinationPath, $filename);
						$droppables[$count] = $filename;
					}
					else {
						$droppables[$count] = 'no img';
						$all_in = false;
					}
				}
				else {
					if($extensionOk == true) {
						$filename = rand(11111,99999).'.'.$extension;
						$file->move($destinationPath, $filename);
						$droppables[$count] = $filename;
					}
					else {
						$droppables[$count] = 'no img';
						$all_in = false;
					}
				}
			}
			else {
				if($count < count($orderings) ) $droppables[$count] = $orderings[$count]->droppable;
			}
			$count++;
		}
		$count = 0;
		foreach ($request->input('draggable') as $draggable) {
			$draggables[$count] = $draggable;
			$count++;
		}
		
		//SUORITA MUUTOKSET
		$ordering_count = 0;
		while ( $ordering_count < count($orderings)) {
			if ( $ordering_count < count($droppables) ) {
				$ordering = $orderings[$ordering_count];
				$ordering->droppable = $droppables[$ordering_count];
				$ordering->draggable = $draggables[$ordering_count];
				$ordering->task_id = $task_id;
				$ordering->task()->associate($task_id);
				$ordering->update();
			}
			else {
				File::delete(public_path().'/img/'. $orderings[$ordering_count]->droppable);
				$orderings[$ordering_count]->delete();
			}
			$ordering_count++;
		}
		while ($ordering_count < count($droppables)) {
			$ordering = new Ordering;
			$ordering->droppable = $droppables[$i];
			$ordering->draggable = $draggables[$i];
			$ordering->showable = 'img';
			$ordering->task_id = $task_id;
			$ordering->task()->associate($task_id);
			$ordering->save();
			$ordering_count++;
		}
		if ($all_in === false) return back()->withErrors( 'Kaikki kuvat eivät tallentuneet' );
    }

	public function edit_multipleChoice(Request $request, $task_id)
	{	
		$task = Task::find($task_id);
		
		//HAE OBJEKTIT
		$i=0;
		foreach ($task->multiplechoises as $multiplechoice) {
			$multiplechoices[$i] = $multiplechoice;
			$i++;
		}
		
		//HAE SYÖTTEET
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
		
		//SUORITA MUUTOKSET
		$count = 0;
		while ( $count < count($multiplechoices)) {
			if ( $count < count($questions) ) {
				$multipleChoice = $multiplechoices[$count];
				$multipleChoice->question = $questions[$count];
				$multipleChoice->choices = $choices[$count];
				$multipleChoice->solution = $solutions[$count];
				$multipleChoice->task_id = $task_id;
				$multipleChoice->task()->associate($task_id);
				$multipleChoice->update();
			}
			else {
				$multiplechoices[$count]->delete();
			}
			$count++;
		}
		while ($count < count($questions)) {
			$multipleChoice = new multipleChoice;
			$multipleChoice->question = $questions[$count];
			$multipleChoice->choices = $choices[$count];
			$multipleChoice->solution = $solutions[$count];
			$multipleChoice->task_id = $task_id;
			$multipleChoice->task()->associate($task_id);
			$multipleChoice->save();
			$count++;
		}
	}
	
	public function edit_crossword(Request $request, $task_id)
    {
		$task = Task::find($task_id);
		
		//HAE OBJEKTIT
		$i=0;
		foreach ($task->crosswords as $crossword) {
			$crosswords[$i] = $crossword;
			$i++;
		}
		
		//HAE SYÖTTEET
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
		
		//SUORITA MUUTOKSET
		$count = 0;
		while ( $count < count($crosswords)) {
			if ( $count < count($words) ) {
				$crossword = $crosswords[$count];
				$crossword->answer = strtolower($words[$count]);
				$crossword->clue = $clues[$count];
				$crossword->position = $positions[$count];
				$crossword->orientation = $orientations[$count];
				$crossword->task_id = $task_id;
				$crossword->task()->associate($task_id);
				$crossword->update();
			}
			else {
				$crosswords[$count]->delete();
			}
			$count++;
		}
		while ($count < count($words)) {
			$crossword = new crossword;
			$crossword->answer = strtolower($words[$count]);
			$crossword->clue = $clues[$count];
			$crossword->position = $positions[$count];
			$crossword->orientation = $orientations[$count];
			$crossword->task_id = $task_id;
			$crossword->task()->associate($task_id);
			$crossword->save();
			$count++;
		}
    }
	
	public function edit_filling(Request $request, $task_id)
    {
		$task = Task::find($task_id);
		$filling = $task->filling;
		$filling->text = $request->input('text');
		$filling->task_id = $task_id;
		$filling->task()->associate($task_id);
		$filling->update();
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
    
      public function addVideo(Request $request, $id) {
    $task = Task::find($id);
    if($task && Auth::user()->is_admin) {
        $video = Video::find($request->input('video_id'));
        if ($video) {
          $task->video()->associate($video);
          $task->save();
           return back()->with('success', 'Video liitettiin tehtävään onnistuneesti');
        }  return back()->withErrors('Videota ei löytynyt.');
    }
    if($task && checkMembership(Auth::user(), $task->school->id)) {
      $video = Video::find($request->input('video_id'));
      if ($video && checkMembership(Auth::user(), $video->school->id)) {
        $task->video()->associate($video);
        $task->save();
        return back()->with('success', 'Video liitettiin tehtävään onnistuneesti');
      }
      return back()->withErrors('Et voi muuttaa videota.');
    }
    return back()->withErrors('Et voi muuttaa tätä tehtävää!');
  }
    
  public function delVideo($id) {
    $task = Task::find($id);
    if($task && Auth::user()->is_admin) {
      $task->video()->dissociate();
      $task->save();
      return back()->with('success', 'Video poistettiin tehtävästä onnistuneesti');
    }
    if($task && checkMembership(Auth::user(), $task->school->id)) {
      $task->video()->dissociate();
      $task->save();
      return back()->with('success', 'Video poistettiin tehtävästä onnistuneesti');
    }
    return back()->withErrors('Et voi muuttaa tätä tehtävää!');
    }
  }
  
}
