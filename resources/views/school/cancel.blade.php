<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#cancelModal">
  <i class="fa fa-btn fa-remove"></i>
  Peru jäsenpyyntö
</button>

<div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="cancelModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="cancelModalLabel">Haluatko perua koulun {!! $school->name !!} jäsenpyynnön?<br>
          <small>Voit anoa kerralla vain yhden koulun jäsenyyttä. Vain yhden koulun jäsenyys on sallittu!</small>
        </h4>
      </div>

      {!! Form::open(array('action'=>array('SchoolController@reject', $school->id, Auth::user()->id), 'method'=>'post')) !!}
        <div class="modal-footer">
          <button type="button" class="btn btn-default center-block pull-left" data-dismiss="modal">Peruuta</button>
          <button type="submit" class="btn btn-danger"> Peru jäsenyys </button>
        </div>
      </div>
      {!! Form::close() !!}
  </div>
</div>
