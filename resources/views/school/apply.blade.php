<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#applyModal">
  <i class="fa fa-btn fa-plus"></i>
  Hae jäsenyyttä
</button>

<div class="modal fade" id="applyModal" tabindex="-1" role="dialog" aria-labelledby="applyModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="applyModalLabel">Haluatko hakea koulun {!! $school->name !!} jäsenyyttä?<br>
          <small>Voit anoa kerralla vain yhden koulun jäsenyyttä. Vain yhden koulun jäsenyys on sallittu!</small>
        </h4>
      </div>

      {!! Form::open(array('action'=>array('SchoolController@apply', $school->id, Auth::user()->id), 'method'=>'post')) !!}
        <div class="modal-footer">
          <button type="button" class="btn btn-default center-block pull-left" data-dismiss="modal">Peruuta</button>
          <button type="submit" class="btn btn-primary"> Hae </button>
        </div>
      </div>
      {!! Form::close() !!}
  </div>
</div>
