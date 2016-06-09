<button type="button" class="btn btn-info center-block" data-toggle="modal" data-target="#editDescriptionModal{{$exercise->descriptions->id}}">
  <span class="glyphicon glyphicon-pencil"></span>
  Muokkaa
</button>

<div class="modal fade" id="editDescriptionModal{{$exercise->descriptions->id}}" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="editDescriptionModal{{$exercise->descriptions->id}}Label">Luo harjoitukselle "{{$exercise->name}}" kuvaus</h4>
      </div>

      {{Form::open(array('action'=>array('DescriptionController@update', $exercise->descriptions->id), 'method'=>'put'))}}
      <div class="modal-body">
        <p>Kuvaus voi jatkua useammalle riville.</p>
        {!! Form::textarea('content', $exercise->descriptions->content, array('class'=>'form-control', 'rows'=>'3', )) !!}
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Peruuta</button>
        <button type="submit" class="btn btn-primary"> OK </button>
        <button type="button" class="btn btn-danger center-block pull-left" data-toggle="modal" data-target="#deleteDescriptionModal{{$exercise->descriptions->id}}">
          Poista
        </button>
      </div>
      {{Form::close()}}
      
    </div>
  </div>
</div>

<div class="modal fade" id="deleteDescriptionModal{{$exercise->descriptions->id}}" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="deleteDescriptionModal{{$exercise->descriptions->id}}">Poistetaanko {{$exercise->name}} harjoituksen kuvaus?</h4>
      </div>

      <div class="modal-footer">
        {{ Form::open(array('action'=>array('DescriptionController@destroy', $exercise->descriptions->id), 'method'=>'delete')) }}
        <button type="button" class="btn btn-default" data-dismiss="modal">Peruuta</button>
        <button type="submit" class="btn btn-danger"> Poista </button>
        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>