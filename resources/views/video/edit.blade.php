<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editVideoModal{{$video->id}}">
  <i class="glyphicon glyphicon-pencil"></i>
  Muokkaa
</button>

<div class="modal fade" id="editVideoModal{{$video->id}}" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title"> Videon "{!! $video->title !!}" muokkaus</h4>
      </div>

      {!! Form::open(array('action'=>array('VideoController@update', $video->id), 'method'=>'put')) !!}
      <div class="modal-body">   
        {!! Form::text('src', null, array( 'class'=>'form-control', 'placeholder'=>'Linkki')) !!}
        {!! Form::text('title', $video->title, array( 'class'=>'form-control', 'placeholder'=>'Otsikko')) !!}
        {!! Form::text('desc', $video->desc, array('class'=>'form-control', 'placeholder'=>'Kuvaus')) !!}
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Peruuta</button>
        <button type="submit" class="btn btn-primary"> Päivitä </button>
        <button type="button" class="btn btn-danger center-block pull-left" data-toggle="modal" data-target="#delVideoModal{{$video->id}}">
          Poista
        </button>
      </div>
      {!! Form::close() !!}
      
    </div>
  </div>
</div>

<div class="modal fade" id="delVideoModal{{$video->id}}" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Poistetaanko video {!! $video->title !!}?</h4>
      </div>

      <div class="modal-footer">
        {!! Form::open(array('action'=>array('VideoController@destroy', $video->id), 'method'=>'delete')) !!}
        <button type="button" class="btn btn-default" data-dismiss="modal">Peruuta</button>
        <button type="submit" class="btn btn-danger"> Poista </button>
        {!! Form::close() !!}
      </div>
      
    </div>
  </div>
</div>
