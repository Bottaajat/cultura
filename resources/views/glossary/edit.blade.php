<button type="button" class="btn btn-info center-block" data-toggle="modal" data-target="#editGlossaryModal{{$material->glossary->id}}">
  <span class="glyphicon glyphicon-pencil"></span>
  Muokkaa
</button>

<div class="modal fade" id="editGlossaryModal{{$material->glossary->id}}" tabindex="-1" role="dialog" aria-labelledby="editGlossaryModal{{$material->glossary->id}}Label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="editModal{{$material->id}}Label"> Sanaston "{{$material->label}}" muokkaus</h4>
      </div>

      {{Form::open(array('action'=>array('GlossaryController@update', $material->glossary->id), 'method'=>'put'))}}
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
              <td>{!! Form::textarea('rus',  $material->glossary->rus, array('class'=>'form-control', 'rows'=>'3', 'placeholder'=>'слово')) !!}</td>
              <td>{!! Form::textarea('fin',  $material->glossary->fin, array('class'=>'form-control', 'rows'=>'3', 'placeholder'=>'sana')) !!}</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Peruuta</button>
        <button type="submit" class="btn btn-primary"> Päivitä </button>
        <button type="button" class="btn btn-danger center-block pull-left" data-toggle="modal" data-target="#delModalGlossary{{$material->glossary->id}}">
          Poista
        </button>
      </div>
      {{Form::close()}}

    </div>

  </div>
</div>

<div class="modal fade" id="delModalGlossary{{$material->glossary->id}}" tabindex="-1" role="dialog" aria-labelledby="#delModalGlossary{{$material->glossary->id}}label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="delModalGlossary{{$material->glossary->id}}label">Poistetaanko {{$material->label}} Sanasto?</h4>
      </div>

      <div class="modal-footer">
        {{Form::open(array('action'=>array('GlossaryController@destroy', $material->glossary->id), 'method'=>'delete'))}}
        <button type="button" class="btn btn-default" data-dismiss="modal">Peruuta</button>
        <button type="submit" class="btn btn-danger"> Poista </button>
        {{Form::close()}}
      </div>
    </div>
  </div>
</div>
