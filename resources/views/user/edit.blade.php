<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#editUserModal{{$user->id}}">
  <i class="glyphicon glyphicon-pencil"></i>
  Muokkaa
</button>

<div class="modal fade" id="editUserModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="editUserModal{{$user->id}}Label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="editUserModal{{$user->id}}Label"> Käyttäjän "{!! $user->name() !!}" muokkaus</h4>
      </div>

      <div class="modal-body">
        {!! Form::open(array('action'=>array('UserController@update', $user->id), 'method'=>'put')) !!}
   
        {!! Form::text('firstname', $user->firstname, array('required', 'class'=>'form-control', 'placeholder'=>'Etunimi')) !!}
        {!! Form::text('lastname', $user->lastname, array('required', 'class'=>'form-control', 'placeholder'=>'Sukunimi')) !!}
        {!! Form::text('email', $user->email, array('required', 'class'=>'form-control', 'placeholder'=>'Sähköposti')) !!}
        {!! Form::text('phone', $user->phone, array('class'=>'form-control', 'placeholder'=>'Puhelinnumero')) !!}
        {!! Form::select('school_id', $school_list, null, ['class' => 'form-control']) !!}
        
        {!! Form::textarea('intro', $user->intro, array('class'=>'form-control', 'rows'=>'3', 'placeholder'=>'Esittely')) !!}
   
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Peruuta</button>
          <button type="submit" class="btn btn-primary"> Päivitä </button>
          <button type="button" class="btn btn-danger center-block pull-left" data-toggle="modal" data-target="#delUserModal{{$user->id}}">
            Poista
          </button>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="delUserModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="#delUserModal{{$user->id}}label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="delUserModal{{$user->id}}label">Poistetaanko käyttäjä {!! $user->firstname . " " . $user->lastname !!}?</h4>
      </div>

      <div class="modal-footer">
        {!! Form::open(array('action'=>array('UserController@destroy', $user->id), 'method'=>'delete')) !!}
        <button type="button" class="btn btn-default" data-dismiss="modal">Peruuta</button>
        <button type="submit" class="btn btn-danger"> Poista </button>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
