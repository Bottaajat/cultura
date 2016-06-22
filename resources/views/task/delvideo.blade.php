<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delVideoModal">
  <i class="fa fa-btn fa-image"></i>
  Poista Video
</button>

<div class="modal fade" id="delVideoModal" tabindex="-1" role="dialog" aria-labelledby="delVideoModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="delVideoModalLabel">Poistetaanko video tehtävästä?</h4>
      </div>

      <div class="modal-footer">
        {{Form::open(array('action'=>array('TaskController@delVideo', $task->id), 'method'=>'post'))}}
        <button type="button" class="btn btn-default" data-dismiss="modal">Peruuta</button>
        <button type="submit" class="btn btn-danger"> Poista </button>
        {{Form::close()}}
      </div>
    </div>

  </div>
</div>