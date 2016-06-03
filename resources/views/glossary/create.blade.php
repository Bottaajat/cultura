<button type="button" class="btn btn-primary center-block" data-toggle="modal" data-target="#createModalGlossary{{$material->id}}">
  <span class="glyphicon glyphicon-plus"></span>
</button>

<div class="modal fade" id="createModalGlossary{{$material->id}}" tabindex="-1" role="dialog" aria-labelledby="#createModalGlossary{{$material->id}}label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="createModalGlossary{{$material->id}}label">Luo materiaalille "{{$material->label}}" sanasto</h4>
      </div>

      {{Form::open(array('action'=>array('GlossaryController@store', $material->id), 'method'=>'POST'))}}
      <div class="modal-body">
        <p> Erottele sanat omille riveille samassa järjestyksessä. </p>
        <table>
          <thead>
            <tr>
              <th>Venäjäksi</th>
              <th>Suomeksi</th>
            </tr>
          </thead>
            <tbody>
              <tr>
                <td>{!! Form::textarea('rus',  null, array('class'=>'form-control', 'rows'=>'3', 'placeholder'=>'слово')) !!}</td>
                <td>{!! Form::textarea('fin',  null, array('class'=>'form-control', 'rows'=>'3', 'placeholder'=>'sana')) !!}</td>
              </tr>
            </tbody>
        </table>
      </div>

      {{ Form::hidden('material_id', $material->id) }}

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Peruuta</button>
        <button type="submit" class="btn btn-primary"> OK </button>
        {{Form::close()}}
      </div>
    </div>

  </div>
</div>
