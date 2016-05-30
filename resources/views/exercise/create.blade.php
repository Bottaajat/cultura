<li> <a href="#createExerciseLink">Luo uusi harjoitus</a> </li>

<div id="createExerciseModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="createExeciseLabel">
  <div class="modal-dialog">
    <div class="modal-content">
    
      <div class="modal-header">
        <h4 class="modal-title" id="createExeciseLabel"> Luo uusi harjoitus</h4>
      </div>
     
      {{ Form::open(array('action'=> array('ExerciseController@store'), 'method'=>'POST')) }}
      
      <div class="modal-body">
        {!! Form::text('name', null, array('required', 'class'=>'form-control', 'placeholder'=>'Harjoituksen nimi')) !!}
        {!! Form::select('topic_id', $topic_list, null, ['class' => 'form-control']) !!}
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Peruuta</button>            
        <button type="submit" class="btn btn-primary"> OK </button>
      </div>
      {{Form::close()}}
    </div>
  </div>
</div>

{{-- Modal ei voi sijaita nav-baarissa --}}
<script>
$(document).ready(function(){
   $('a[href="#createExerciseLink"]').click(function(){
      var modal = document.getElementById( "createExerciseModal" );
      $( modal ).detach().appendTo( document.body);
      $("#createExerciseModal").modal();
   }); 
});
</script>
