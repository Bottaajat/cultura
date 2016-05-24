<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delExerciseModal">
  <span class="glyphicon glyphicon-remove"></span>
</button>
{{Form::close()}}


<div class="modal fade" id="delExerciseModal" tabindex="-1" role="dialog" aria-labelledby="delExerciseModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    
      <div class="modal-header">
        <h4 class="modal-title" id="delExerciseModalLabel">Poistataanko {{$exercise->name}}?</h4>
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
