@if (!checkMembership(Auth::user(), $task->exercise->school))

<button type="button" class="btn btn-info disabled">
  <span class="glyphicon glyphicon-pencil"></span>
  Muokkaa
</button>

@else

<button type="button" class="btn btn-info" data-toggle="modal" data-target="#editGlossaryModal{!!$task->glossary->id!!}">
  <span class="glyphicon glyphicon-pencil"></span>
  Muokkaa
</button>

<div class="modal fade" id="editGlossaryModal{!!$task->glossary->id!!}" tabindex="-1" role="dialog" aria-nameledby="editGlossaryModal{!!$task->glossary->id!!}label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="editModal{!!$task->id!!}label"> Sanaston "{!!$task->name!!}" muokkaus</h4>
      </div>

      {!!Form::open(array('action'=>array('TaskGlossaryController@update', $task->glossary->id), 'method'=>'put'))!!}
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
              <td>{!! Form::textarea('rus',  $task->glossary->rus, array('class'=>'form-control', 'rows'=>'3', 'placeholder'=>'слово')) !!}</td>
              <td>{!! Form::textarea('fin',  $task->glossary->fin, array('class'=>'form-control', 'rows'=>'3', 'placeholder'=>'sana')) !!}</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Peruuta</button>
        <button type="submit" class="btn btn-primary"> Päivitä </button>
        <button type="button" class="btn btn-danger center-block pull-left" data-toggle="modal" data-target="#delModalGlossary{!!$task->glossary->id!!}">
          Poista
        </button>
      </div>
      {!!Form::close()!!}

    </div>

  </div>
</div>

<div class="modal fade" id="delModalGlossary{!!$task->glossary->id!!}" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="delModalGlossary{!!$task->glossary->id!!}label">Poistetaanko {!!$task->name!!} Sanasto?</h4>
      </div>

      <div class="modal-footer">
        {!!Form::open(array('action'=>array('TaskGlossaryController@destroy', $task->glossary->id), 'method'=>'delete'))!!}
        <button type="button" class="btn btn-default" data-dismiss="modal">Peruuta</button>
        <button type="submit" class="btn btn-danger"> Poista </button>
        {!!Form::close()!!}
      </div>
    </div>
  </div>
</div>

@endif
