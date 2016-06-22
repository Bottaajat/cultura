<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#createExerciseModal">
  <span class="glyphicon glyphicon-plus"> </span>
  Luo uusi harjoitus
</button>

<div id="createExerciseModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="createExeciseLabel">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="createExeciseLabel"> Luo uusi harjoitus</h4>
      </div>

      {!! Form::open(array('action'=> array('ExerciseController@store'), 'method'=>'POST')) !!}

      <div class="modal-body">
        {!! Form::text('name', null, array('required', 'class'=>'form-control', 'placeholder'=>'Harjoituksen nimi')) !!}
        {!! Form::select('topic_id', $topic_list, null, ['class' => 'form-control']) !!}
        {!! Form::textarea('description',  null, array('class'=>'form-control', 'rows'=>'3', 'placeholder'=>'Kuvaus')) !!}
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Peruuta</button>
        <button type="submit" class="btn btn-primary"> OK </button>
      </div>

      {!! Form::close() !!}

    </div>
  </div>
</div>
