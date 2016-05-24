<button type="button" class="btn btn-info" data-toggle="modal" data-target="#editModal{{$exercise->id}}">
  <span class="glyphicon glyphicon-pencil"></span>
</button>

<div class="modal fade" id="editModal{{$exercise->id}}" tabindex="-1" role="dialog" aria-labelledby="editModal{{$exercise->id}}Label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    
      <div class="modal-header">
        <h4 class="modal-title" id="editModal{{$exercise->id}}Label"> {{$exercise->name}} Muokkaus</h4>
      </div>
      
      <div class="modal-body">
        {{Form::open(array('action'=>array('ExerciseController@update', $exercise->id), 'method'=>'put'))}}
   
        {!! Form::label('Nimi', null, ['class' => 'control-label col-sm-2']) !!}
        {!! Form::text('exercise', null, array('required', 'class'=>'form-control', 'placeholder'=> $exercise->name)) !!}
        {!! Form::label('Aihe', null, ['class' => 'control-label col-sm-2']) !!}
        {!! Form::select('topic_name', $topic_names, null, ['class' => 'form-control']) !!}

      </div>
      
      <div class="modal-footer">
        
        <button type="button" class="btn btn-default" data-dismiss="modal">Peruuta</button>            
        <button type="submit" class="btn btn-Primary"> Päivitä </button>
        {{Form::close()}}
      </div>
    </div>
    
  </div>
</div>
