<button type="button" class="btn btn-info center-block" data-toggle="modal" data-target="#editModal{{$material->id}}">
  <span class="glyphicon glyphicon-pencil"></span>
</button>

<div class="modal fade" id="editModal{{$material->id}}" tabindex="-1" role="dialog" aria-labelledby="editModal{{$material->id}}Label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="editModal{{$material->id}}Label"> {{$material->label}} muokkaus</h4>
      </div>

      {!! Form::open(array('action'=>array('MaterialController@update', $material->id), 'method'=>'put')) !!}
      <div class="modal-body">
        {!! Form::text('exercise_name', $material->name, array('class'=>'form-control', 'placeholder'=> 'Harjoituksen nimi')) !!}
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Peruuta</button>
        <button type="submit" class="btn btn-primary"> Päivitä </button>
      </div>
      {!! Form::close() !!}
    </div>

  </div>
</div>
