<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#editPicModal">
  <i class="fa fa-btn fa-image"></i>
  Lisää
</button>

<div class="modal fade" id="editPicModal" tabindex="-1" role="dialog" aria-labelledby="editPicModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="editPicModalLabel">Logon muokkaus</h4>
      </div>

      {!! Form::open(array('action'=>array('SchoolController@addLogo', $school->id), 'method'=>'post', 'files' => true)) !!}
      <div class="modal-body">

        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
          <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i>
            <span class="fileinput-filename"></span>
          </div>
          <span class="input-group-addon btn btn-info btn-file">
            <span class="fileinput-new">Valitse tiedosto</span>
            <span class="fileinput-exists">Vaihda tiedostoa</span>
            <input type="file" name="file">
          </span>
          <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Poista</a>
        </div>


      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Peruuta</button>
        <button type="submit" class="btn btn-primary"> Päivitä </button>
         <button type="button" class="btn btn-danger center-block pull-left" data-toggle="modal" data-target="#delPicModal">
          Poista
        </button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>

<div class="modal fade" id="delPicModal" tabindex="-1" role="dialog" aria-labelledby="delPicModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="delPicModalLabel">Poistetaanko profiilikuva?</h4>
      </div>

      <div class="modal-footer">
        {{Form::open(array('action'=>array('SchoolController@delLogo', $school->id), 'method'=>'post'))}}
        <button type="button" class="btn btn-default" data-dismiss="modal">Peruuta</button>
        <button type="submit" class="btn btn-danger"> Poista </button>
        {{Form::close()}}
      </div>
    </div>

  </div>
</div>
