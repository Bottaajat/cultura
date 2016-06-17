<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delModal{{$task->id}}">
  <span class="glyphicon glyphicon-remove"></span>
</button>

<div class="modal fade" id="delModal{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="delModal{{$task->id}}Label">
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
