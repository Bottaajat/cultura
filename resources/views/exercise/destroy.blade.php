<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delModal{{$exercise->id}}">
  <span class="glyphicon glyphicon-remove"></span>
</button>

<div class="modal fade" id="delModal{{$exercise->id}}" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" >Poistetaanko {{$exercise->name}}?</h4>
      </div>
      <div class="modal-body">
        <strong>Tämä tuhoaa harjoitukseen liitetyt materiaalit ja tehtävät !</strong>
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
