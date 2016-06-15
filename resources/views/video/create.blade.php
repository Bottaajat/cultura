<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#createUserModal">
  <span class="glyphicon glyphicon-plus"> </span>
  Luo uusi Video
</button>

<div id="createUserModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="createUserLabel">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="createUserLabel"> Luo uusi Video</h4>
      </div>

      {!! Form::open(array('action'=> array('VideoController@store'), 'method'=>'POST')) !!}

      <div class="modal-body">
        {!! Form::text('src', null, array( 'class'=>'form-control', 'placeholder'=>'Linkki')) !!}
        {!! Form::text('title', null, array( 'class'=>'form-control', 'placeholder'=>'Otsikko')) !!}
        {!! Form::text('desc', null, array('class'=>'form-control', 'placeholder'=>'Kuvaus')) !!}
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Peruuta</button>
        <button type="submit" class="btn btn-primary"> OK </button>
      </div>

      {!! Form::close() !!}

    </div>
  </div>
</div>
