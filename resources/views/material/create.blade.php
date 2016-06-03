<li> <a href="#createMaterialLink">Lisää materiaalia</a> </li>

<div id="createMaterialModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="createMaterialLabel">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="createMaterialLabel">Lisää materiaalia</h4>
      </div>

      {!! Form::open(array('action'=> 'MaterialController@store', 'method'=>'POST', 'files' => true)) !!}

      <div class="modal-body">
        {!! Form::text('label', null, array('required', 'class'=>'form-control', 'placeholder'=>'Materiaalin otsikko')) !!}
        {!! Form::textarea('contents', null, array('class'=>'form-control', 'rows'=>'3', 'placeholder'=>'Teksti sisältö')) !!}
        {!! Form::select('type', ["text"=>'Teksti', "audio"=>'Ääni', "image"=>'Kuva', "video"=>'Video'],null, ['class' => 'form-control']) !!}
        {!! Form::select('exercise_id', $exercise_list, null, ['class' => 'form-control']) !!}

        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
          <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i>
            <span class="fileinput-filename"></span>
          </div>
          <span class="input-group-addon btn btn-info btn-file">
            <span class="fileinput-new">Valitse tiedosto</span>
            <span class="fileinput-exists">Vaihda tiedostoa</span>
            <input type="file" name="file">
          </span>
          <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Poista</a>
        </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Peruuta</button>
        <button type="submit" class="btn btn-primary"> OK </button>
      </div>

      {!! Form::close() !!}

    </div>
  </div>
</div>

{{-- Modal ei voi sijaita nav-baarissa --}}
<script>
$(document).ready(function(){
   $('a[href="#createMaterialLink"]').click(function(){
      var modal = document.getElementById( "createMaterialModal" );
      $( modal ).detach().appendTo( document.body);
      $("#createMaterialModal").modal();
   });
});
</script>
