<button type="button" class="btn btn-danger center-block" data-toggle="modal" data-target="#delModal{{$material->id}}">
  <span class="glyphicon glyphicon-remove"></span>
</button>

<div class="modal fade" id="delModal{{$material->id}}" tabindex="-1" role="dialog" aria-labelledby="delModal{{$material->id}}Label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="delModal{{$material->id}}Label">Poistetaanko {{$material->label}}?</h4>
      </div>

      <div class="modal-footer">
        {{Form::open(array('action'=>array('MaterialController@destroy', $material->id), 'method'=>'delete'))}}
        <button type="button" class="btn btn-default" data-dismiss="modal">Peruuta</button>
        <button type="submit" class="btn btn-danger"> Poista </button>
        {{Form::close()}}
      </div>
    </div>

  </div>
</div>
