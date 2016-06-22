<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addVideoModal">
  <i class="fa fa-btn fa-image"></i>
  @if($task->video)
    Muuta video
  @else
    Lisää video
  @endif
</button>


<div class="modal fade" id="addVideoModal" tabindex="-1" role="dialog" aria-labelledby="addVideoModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="addVideoModalLabel"> Videon lisäys </h4>
      </div>

      {!! Form::open(array('action'=>array('TaskController@addVideo', $task->id), 'method'=>'post', 'files' => true)) !!}
      <div class="modal-body">
        <select name="video_id" class="form-control center-block" size="5">
          @foreach ($videos as $video)
            <option
             @if( $task->video && $video->id == $task->video->id )
              selected="selected"
             @endif
              value="{{$video->id}}">{{$video->title}}</option>
          @endforeach
        </select>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Peruuta</button>
        <button type="submit" class="btn btn-primary">
          @if($task->video)
            Muuta video
          @else
            Lisää video
          @endif
        </button>
      </div>
      
      {!! Form::close() !!}
    </div>
  </div>
</div>

