<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editSchoolModal{{$school->id}}">
  <i class="glyphicon glyphicon-pencil"></i>
  Muokkaa
</button>

<div class="modal fade" id="editSchoolModal{{$school->id}}" tabindex="-1" role="dialog" aria-labelledby="editSchoolModal{{$school->id}}Label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="editSchoolModal{{$school->id}}Label"> Koulun "{!! $school->name !!}" muokkaus</h4>
      </div>

      {!! Form::open(array('action'=>array('SchoolController@update', $school->id), 'method'=>'put')) !!}
      <div class="modal-body">

        {!! Form::text('name', $school->name, array('required', 'class'=>'form-control', 'placeholder'=>'Koulun nimi')) !!}

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Peruuta</button>
          <button type="submit" class="btn btn-primary"> Päivitä </button>
          <button type="button" class="btn btn-danger center-block pull-left" data-toggle="modal" data-target="#delSchoolModal{{$school->id}}">
            Poista
          </button>
        </div>
      </div>
      {!! Form::close() !!}
  </div>
</div>

<div class="modal fade" id="delSchoolModal{{$school->id}}" tabindex="-1" role="dialog" aria-labelledby="#delSchoolModal{{$school->id}}label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="delSchoolModal{{$school->id}}label">Poistetaanko koulu {!! $school->name !!}?</h4>
      </div>

      <div class="modal-footer">
        {!! Form::open(array('action'=>array('SchoolController@destroy', $school->id), 'method'=>'delete')) !!}
        <button type="button" class="btn btn-default" data-dismiss="modal">Peruuta</button>
        <button type="submit" class="btn btn-danger"> Poista </button>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
</div>
