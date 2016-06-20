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

      {!! Form::open(array('action'=> array('TaskController@update', $task->id), 'method'=>'put')) !!}

      <div class="modal-body">
        {!! Form::text('name', null, array('required', 'class'=>'form-control', 'placeholder'=>'Tehtävän nimi')) !!}
        {!! Form::select('task_id', $exercise_list, null, ['id' => 'task_id', 'class' => 'form-control']) !!}
        {!! Form::select('task_type', $type_list, null, ['id' => 'task_type', 'class' => 'form-control']) !!}
        {!! Form::textarea('assignment', null, ['id' => 'assignment', 'size' => '30x2', 'class' => 'form-control']) !!}
      </div>

      {{Html::script('/js/task.create.js')}}

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
