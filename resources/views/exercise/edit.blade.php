<button type="button" class="btn btn-primary center-block" data-toggle="modal" data-target="#editModal{{$exercise->id}}">
  <span class="glyphicon glyphicon-pencil"></span>
  Muokkaa
</button>

<div class="modal fade" id="editModal{{$exercise->id}}" tabindex="-1" role="dialog" aria-labelledby="editModal{{$exercise->id}}Label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="editModal{{$exercise->id}}Label"> {{$exercise->name}} muokkaus</h4>
      </div>

      {!! Form::open(array('action'=>array('ExerciseController@update', $exercise->id), 'method'=>'put')) !!}
      <div class="modal-body">
        {!! Form::text('name', $exercise->name, array('class'=>'form-control', 'placeholder'=> 'Harjoituksen nimi')) !!}
        {!! Form::select('topic_id', $topic_list, $exercise->topic->id, ['class' => 'form-control']) !!}
        {!! Form::textarea('description',  $exercise->description, array('class'=>'form-control', 'rows'=>'3', 'placeholder'=>'Kuvaus')) !!}
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Peruuta</button>
        <button type="submit" class="btn btn-primary"> Päivitä </button>
         <button type="button" class="btn btn-danger center-block pull-left" data-toggle="modal" data-target="#delModal{{$exercise->id}}">
          Poista
        </button>

      </div>
      {!! Form::close() !!}
    </div>

  </div>
</div>


<div class="modal fade" id="delModal{{$exercise->id}}" tabindex="-1" role="dialog" aria-labelledby="delModal{{$exercise->id}}Label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="delModal{{$exercise->id}}Label">Poistetaanko {{$exercise->name}}?</h4>
      </div>
      
      <div class="modal-body">
        <strong>Tämä tuhoaa KAIKKI harjoitukseen liitetyt materiaalit ja tehtävät !</strong>
      </div>
      
      <div class="modal-footer">
        {{Form::open(array('action'=>array('ExerciseController@destroy', $exercise->id), 'method'=>'delete'))}}
        <button type="button" class="btn btn-default" data-dismiss="modal">Peruuta</button>
        <button type="submit" class="btn btn-danger"> Poista </button>
        {{Form::close()}}
      </div>
    </div>

  </div>
</div>
