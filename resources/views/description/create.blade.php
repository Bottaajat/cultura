<button type="button" class="btn btn-info center-block" data-toggle="modal" data-target="#createDescriptionModal{{$exercise->id}}">
  <span class="glyphicon glyphicon-plus"></span>
  Luo
</button>

<div class="modal fade" id="createDescriptionModal{{$exercise->id}}" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="createDescriptionModal{{$exercise->id}}Label">Luo harjoitukselle "{{$exercise->name}}" kuvaus</h4>
      </div>

      {{Form::open(array('action'=>array('DescriptionController@store', $exercise->id), 'method'=>'POST'))}}
      <div class="modal-body">
        <p>Kuvaus voi jatkua useammalle riville.</p>
        {!! Form::textarea('content', null, array('class'=>'form-control', 'rows'=>'3', )) !!}
      </div>

      {!! Form::hidden('exercise_id', $exercise->id) !!}

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Peruuta</button>
        <button type="submit" class="btn btn-primary"> OK </button>
      </div>
      
     {{Form::close()}}
    </div>

  </div>
</div>