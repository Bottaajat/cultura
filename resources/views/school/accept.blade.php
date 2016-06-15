<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#editSchoolModal{{$school->id}}">
  <i class="fa fa-btn fa-question"></i>
</button>

<div class="modal fade" id="editSchoolModal{{$school->id}}" tabindex="-1" role="dialog" aria-labelledby="editSchoolModal{{$school->id}}Label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="editSchoolModal{{$school->id}}Label">Haluatko hakea koulun {!! $school->name !!} jäsenyyttä?</h4>
      </div>

      {!! Form::open(array('action'=>array('SchoolController@apply', $school->id), 'method'=>'post')) !!}
        <div class="modal-footer">
          <button type="button" class="btn btn-default center-block pull-left" data-dismiss="modal">Peruuta</button>
          <button type="submit" class="btn btn-primary"> Hae </button>
        </div>
      </div>
      {!! Form::close() !!}
  </div>
</div>

</div>
