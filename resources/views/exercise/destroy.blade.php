{{Form::open(array('action'=>array('ExerciseController@destroy', $exercise->id), 'method'=>'delete'))}}
<button type="submit" class="btn btn-danger">
<span class="glyphicon glyphicon-remove"></span>
</button>
{{Form::close()}}
