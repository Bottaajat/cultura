<button type="button" class="btn btn-info" data-toggle="modal" data-target="#editModal{{$exercise->id}}">
  <span class="glyphicon glyphicon-pencil"></span>
</button>

<div class="modal fade" id="editModal{{$exercise->id}}" tabindex="-1" role="dialog" aria-labelledby="editModal{{$exercise->id}}Label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    
      <div class="modal-header">
        <h4 class="modal-title" id="editModal{{$exercise->id}}Label"> {{$exercise->name}} muokkaus</h4>
      </div>
     
      {{Form::open(array('action'=>array('ExerciseController@update', $exercise->id), 'method'=>'put'))}}
      <div class="modal-body">
        {!! Form::text('exercise_name', $exercise->name, array('class'=>'form-control', 'placeholder'=> 'Harjoituksen nimi')) !!}
        {{ Form::select('topic_id', $topic_list, null, ['class' => 'form-control']) }}
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Peruuta</button>            
        <button type="submit" class="btn btn-primary"> Päivitä </button>
      </div>
      {{Form::close()}}
    </div>
    
  </div>
</div>
