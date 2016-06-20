<button type="button" class="btn btn-info" data-toggle="modal" data-target="#createModalGlossary{!!$task->id!!}">
  <span class="glyphicon glyphicon-plus"></span>
  Luo
</button>

<div class="modal fade" id="createModalGlossary{!!$task->id!!}" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="createModalGlossary{!!$task->id!!}label">Luo tehtävälle "{!!$task->name!!}" sanasto</h4>
      </div>

      {!!Form::open(array('action'=>array('TaskGlossaryController@store', $task->id), 'method'=>'POST'))!!}
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
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Peruuta</button>
        <button type="submit" class="btn btn-primary"> OK </button>
      </div>
      {!! Form::hidden('task_id', $task->id) !!}
      {!! Form::close() !!}
      
    </div>
  </div>
</div>
