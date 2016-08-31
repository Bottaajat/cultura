<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#acceptModal{{$item->id}}">
  <i class="fa fa-btn fa-check"></i>/<i class="fa fat-btn fa-close"></i>
</button>

<div class="modal fade" id="acceptModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="acceptModal{{$item->id}}Label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="acceptModal{{$item->id}}Label">Hyväksytäänkö käyttäjän {!! $item->name() !!} jäsenpyyntö?</h4>
      </div>

      {!! Form::open(array('action'=>array('SchoolController@accept', $school->id, $item->id), 'method'=>'post')) !!}
        <div class="modal-footer">
          <button type="button" class="btn btn-danger center-block pull-left" data-toggle="modal" data-target="#rejectModal{{$item->id}}">
            Peru jäsenyys
          </button>
          <button type="submit" class="btn btn-primary"> Hyväksy jäsenyys </button>
        </div>
      </div>
      {!! Form::close() !!}
  </div>
</div>

<div class="modal fade" id="rejectModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="rejectModal{{$item->id}}Label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="rejectModal{{$item->id}}Label">Haluatko varmasti perua {!! $item->name() !!} jäsenyyden?
        </h4>
      </div>

      {!! Form::open(array('action'=>array('SchoolController@reject', $school->id, $item->id), 'method'=>'post')) !!}
        <div class="modal-footer">
          <button type="button" class="btn btn-default center-block pull-left" data-dismiss="modal">Peruuta</button>
          <button type="submit" class="btn btn-danger"> Peru jäsenyys </button>
        </div>
      </div>
      {!! Form::close() !!}
  </div>
</div>
