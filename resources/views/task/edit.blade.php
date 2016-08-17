<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal{{$task->id}}">
  <span class="glyphicon glyphicon-pencil"></span>
  Muokkaa
</button>

<div class="modal fade" id="editModal{{$task->id}}" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="editModal{{$task->id}}Label"> {{$task->name}} muokkaus</h4>
      </div>

      {!! Form::open(array('action'=> array('TaskController@update', $task->id), 'method'=>'put', 'files' => true)) !!}

      <div class="modal-body">
        {!! Form::text('name', $task->name, array('required', 'class'=>'form-control', 'placeholder'=>'Tehtävän nimi')) !!}
        {!! Form::select('exercise_id', $exercise_list, $task->exercise->id, ['id' => 'exercise_id', 'class' => 'form-control' ]) !!}
        {!! Form::text('task_type', $task->type, ['readonly', 'id' => 'task_type', 'class' => 'form-control']) !!}
        {!! Form::textarea('assignment', $task->assignment, ['id' => 'assignment', 'size' => '30x2', 'class' => 'form-control', 'placeholder' => 'Tehtävänanto']) !!}
      </div>

      {{Html::script('/js/task.edit.js')}}
	  {{Html::style('/css/task.create.css')}}
	  
	  <div id="edit-{!! $task->id !!}-input" class="panel-body">
        
      </div>
	  
	  <div id="edit-{!! $task->id !!}-preview" class="panel-body">
        
      </div>
	  
	  <?php
		
		if ($task->type == 'Sanojen yhdistäminen') {
			$i=0;
			foreach ($task->orderings as $ordering) {
				$draggables[$i] = $ordering->draggable;
				$droppables[$i] = $ordering->droppable;
				$showables[$i] = $ordering->showable;
				$i++;
			}
			$draggables = '["'.str_replace(',', '","', implode(',', $draggables)).'"]';
			$droppables = '["'.str_replace(',', '","', implode(',', $droppables)).'"]';
			$showables = '["'.str_replace(',', '","', implode(',', $showables)).'"]';
			echo '<script>Edit_OrderingWords('.$draggables.','.$droppables.','.$showables.','.$task->id.')</script>';
		}
		if ($task->type == 'Kuvien yhdistäminen') {
			$i=0;
			foreach ($task->orderings as $ordering) {
				$draggables[$i] = $ordering->draggable;
				$droppables[$i] = $ordering->droppable;
				$i++;
			}
			$draggables = '["'.str_replace(',', '","', implode(',', $draggables)).'"]';
			$droppables = '["'.str_replace(',', '","', implode(',', $droppables)).'"]';
			echo '<script>Edit_OrderingImages('.$draggables.','.$droppables.','.$task->id.')</script>';
		} 
		if ($task->type == 'Monivalinta') {
			$i=0;
			foreach ($task->multiplechoises as $multipleChoice) {
				$questions[$i] = $multipleChoice->question;
				$choices[$i] = $multipleChoice->choices;
				$solutions[$i] = $multipleChoice->solution;
				$i++;
			}
			$questions = '["'.str_replace(',', '","', implode(',', $questions)).'"]';
			$choices = '["'.str_replace("\r\n",'###',str_replace(',', '","', implode(',', $choices))).'"]';
			$solutions = '["'.str_replace("\r\n",'###',str_replace(',', '","', implode(',', $solutions))).'"]';
			echo '<script>Edit_MultipleChoice('.$questions.','.$choices.','.$solutions.','.$task->id.')</script>';
		}
		if ($task->type == 'Sanaristikko') {
			$i=0;
			foreach ($task->crosswords as $crossword) {
				$answers[$i] = $crossword->answer;
				$clues[$i] = $crossword->clue;
				$positions[$i] = $crossword->position;
				$i++;
			}
			$answers = '["'.str_replace(',', '","', implode(',', $answers)).'"]';
			$clues = '["'.str_replace(',', '","', implode(',', $clues)).'"]';
			$positions = '["'.str_replace(',', '","', implode(',', $positions)).'"]';
			echo '<script>Edit_Crossword('.$answers.','.$clues.','.$positions.','.$task->id.')</script>';
		}
		if ($task->type == 'Täyttö') echo '<script>Edit_Filling("'.$task->filling->text.'",'.$task->id.')</script>';
	  ?>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Peruuta</button>
        <button type="submit" class="btn btn-primary"> Päivitä </button>
         <button type="button" class="btn btn-danger center-block pull-left" data-toggle="modal" data-target="#delModal{{$task->id}}">
          Poista
        </button>
      </div>
      
      {!! Form::close() !!}
    </div>

  </div>
</div>

<div class="modal fade" id="delModal{{$task->id}}" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    
      <div class="modal-header">
        <h4 class="modal-title" id="delModal{{$task->id}}Label">Poistetaanko {{$task->name}}?</h4>
      </div>
      
      <div class="modal-footer">
        {{Form::open(array('action'=>array('TaskController@destroy', $task->id), 'method'=>'delete'))}}
        <button type="button" class="btn btn-default" data-dismiss="modal">Peruuta</button>            
        <button type="submit" class="btn btn-danger"> Poista </button>
        {{Form::close()}}
      </div>
    </div>
    
  </div>
</div>
