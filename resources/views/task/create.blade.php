<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#createTaskModal">
  <span class="glyphicon glyphicon-plus"> </span> 
  Luo uusi tehtävä 
</button>

{{Html::style('/css/task.create.css')}}

<div id="createTaskModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="createTaskLabel"> Luo uusi tehtävä</h4>
      </div>

      {!! Form::open(array('action'=> array('TaskController@store'), 'method'=>'POST', 'files' => true)) !!}

      <div class="modal-body">
        {!! Form::text('name', null, array('required', 'class'=>'form-control', 'placeholder'=>'Tehtävän nimi')) !!}
        {!! Form::select('exercise_id', $exercise_list, null, ['id' => 'exercise_id', 'class' => 'form-control']) !!}
		{!! Form::select('task_type', $type_list, null, ['id' => 'task_type', 'class' => 'form-control']) !!}
        {!! Form::textarea('assignment', null, ['id' => 'assignment', 'size' => '30x2', 'class' => 'form-control']) !!}
	  </div>
	  
	  {{Html::script('/js/task.create.js')}}
	  
	  <div id="input" class="panel-body">
        
      </div>
	  
	  <div id="preview" class="panel-body">
        
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Peruuta</button>
        <button type="submit" class="btn btn-primary"> OK </button>
      </div>

      {!! Form::close() !!}

    </div>
  </div>
</div>
