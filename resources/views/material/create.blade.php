<li> <a href="#createMaterialLink">Lisää materiaalia</a> </li>

<div id="createMaterialModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="createMaterialLabel">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="createMaterialLabel">Lisää materiaalia</h4>
      </div>

      {!! Form::open(array('action'=> array('MaterialController@store'), 'method'=>'POST')) !!}

      <div class="modal-body">
        {!! Form::text('name', null, array('required', 'class'=>'form-control', 'placeholder'=>'Harjoituksen nimi')) !!}
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
