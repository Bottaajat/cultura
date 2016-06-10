<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#createUserModal">
  <span class="glyphicon glyphicon-plus"> </span>
  Luo uusi käyttäjä
</button>

<div id="createUserModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="createUserLabel">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="createUserLabel"> Luo uusi käyttäjä</h4>
      </div>

      {!! Form::open(array('action'=> array('UserController@store'), 'method'=>'POST')) !!}
      {{ csrf_field() }}

      <div class="modal-body">
        {!! Form::text('firstname', null, array('required', 'class'=>'form-control', 'placeholder'=>'Etunimi')) !!}
        {!! Form::text('lastname', null, array('required', 'class'=>'form-control', 'placeholder'=>'Sukunimi')) !!}
        {!! Form::email('email', null, array('required', 'class'=>'form-control', 'placeholder'=>'Sähköposti')) !!}
        {!! Form::text('phone', null, array('class'=>'form-control', 'placeholder'=>'Puhelinnumero')) !!}
        {!! Form::textarea('intro', null, array('class'=>'form-control', 'rows'=>'3', 'placeholder'=>'Esittely')) !!}
        {!! Form::select('school_id', $school_list, null, ['class' => 'form-control']) !!}
        <hr></hr>
        {{ Form::password('password', array('class' => 'form-control', 'placeholder'=>'Salasana')) }}
        {!! Form::token() !!}
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Peruuta</button>
        <button type="submit" class="btn btn-primary"> OK </button>
      </div>

      {!! Form::close() !!}

    </div>
  </div>
</div>
