<button type="button" class="btn btn-primary center-block" data-toggle="modal" data-target="#acceptModal{{$item->id}}">
  <i class="fa fa-btn fa-question"></i>
</button>

<div class="modal fade" id="acceptModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="acceptModal{{$item->id}}Label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="acceptModal{{$item->id}}Label">Hyväksy käyttäjän {!! $item->name() !!} jäsenyyspyyntö</h4>
      </div>

      {!! Form::open(array('action'=>array('SchoolController@accept', $school->id, $item->id), 'method'=>'post')) !!}
        <div class="modal-footer">
          <button type="button" class="btn btn-default center-block pull-left" data-dismiss="modal">Hylkää</button>
          <button type="submit" class="btn btn-primary"> Hyväksy </button>
        </div>
      </div>
      {!! Form::close() !!}
  </div>
</div>
