<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createSchoolModal">
  <span class="glyphicon glyphicon-plus"> </span>
  Luo uusi koulu
</button>

<div id="createSchoolModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="createSchoolLabel">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="createSchoolLabel"> Luo uusi koulu</h4>
      </div>

      {!! Form::open(array('action'=> array('SchoolController@store'), 'method'=>'POST')) !!}

      <div class="modal-body">
        {!! Form::text('name', null, array('required', 'class'=>'form-control', 'placeholder'=>'Koulun nimi')) !!}
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Peruuta</button>
        <button type="submit" class="btn btn-primary"> OK </button>
      </div>

      {!! Form::close() !!}

    </div>
  </div>
</div>
