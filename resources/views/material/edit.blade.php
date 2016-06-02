<button type="button" class="btn btn-info center-block" data-toggle="modal" data-target="#editModal{{$material->id}}">
  <span class="glyphicon glyphicon-pencil"></span>
</button>

<div class="modal fade" id="editModal{{$material->id}}" tabindex="-1" role="dialog" aria-labelledby="editModal{{$material->id}}Label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="editModal{{$material->id}}Label"> {{$material->label}} muokkaus</h4>
      </div>

      {!! Form::open(array('action'=>array('MaterialController@update', $material->id), 'method'=>'put')) !!}
      <div class="modal-body">
        {!! Form::text('label', $material->label, array('required', 'class'=>'form-control', 'placeholder'=>'Materiaalin otsikko')) !!}
        {!! Form::textarea('content', $material->contents, array('class'=>'form-control', 'rows'=>'3', 'placeholder'=>'Teksti sisältö')) !!}
        {!! Form::select('type', ["text"=>'Teksti', "sound"=>'Ääni', "image"=>'Kuva', "video"=>'Video'],$material->type , ['class' => 'form-control']) !!}
        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
          <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i>
            <span class="fileinput-filename"></span>
          </div>
          <span class="input-group-addon btn btn-info btn-file">
            <span class="fileinput-new">Valitse tiedosto</span>
            <span class="fileinput-exists">Vaihda tiedostoa</span>
            <input type="file" name="...">
          </span>
          <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Poista</a>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Peruuta</button>
        <button type="submit" class="btn btn-primary"> Päivitä </button>
      </div>
      {!! Form::close() !!}
    </div>

  </div>
</div>
