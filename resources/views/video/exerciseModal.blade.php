<button type="button" 
        class="btn btn-success btn-lg" 
        data-toggle="modal" 
        data-target="#exerListModal{{$video->id}}">
  {!! $video->tasks()->count() !!}
</button>

<div class="modal fade" id="exerListModal{{$video->id}}" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title"> Videon "{!! $video->title !!}" tehtävät</h4>
      </div>

      <div class="modal-body">
        <ul class="list-group">
        @foreach($video->tasks()->get() as $task)
          <a class="list-group-item" href="{!! action('TaskController@show', ['id' => $task->id]) !!}">
            <h4> {!! $task->name !!} </h4>
          </a>
        @endforeach
        </ul>
      </div>
      
    </div>
  </div>
</div>
