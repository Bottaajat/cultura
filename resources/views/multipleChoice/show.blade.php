@section('pagehead')
  {!! Html::script("/js/multipleChoice.js") !!}
@stop

<form onSubmit="checkSolutions(); return false;">
  
    @foreach($task->multiplechoises as $mc)
    <div name="question" class="form-group">
        <label>{!! $mc->id . ". " . $mc->question !!}</label>
        
        @foreach($mc->randomOrderChoices() as $key => $choice)
        <div class="question">
          <p>
            @if($mc->getSolutionCount() == 1) 
              <input type="radio" autocomplete="off" class="option" name="optionsRadios-{!!$mc->id!!}" id="optionsRadios-{!!$mc->id!!}-{!!$key!!}" value="{!! $mc->checkSolution($choice) !!}">
            @else
              <input type="checkbox" autocomplete="off" class="option" name="optionsRadios-{!!$mc->id!!}" id="optionsRadios-{!!$mc->id!!}-{!!$key!!}" value="{!! $mc->checkSolution($choice) !!}">
            @endif
            {!! $choice !!}
          </p>
        </div>
        @endforeach

    </div>
    @endforeach

    <div class="panel-body">
    	<button class="btn btn-success" type="submit">Tarkista</button>
    </div>
</form>

<div id="tooMany" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h4 class="modal-title">Valitsit liian monta vaihtoehtoa.</h4>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Sulje</button>
	  </div>
		</div>
	</div>
</div>


<div id="tooFew" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h4 class="modal-title">Et valinnut kaikkia kohtia!</h4>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Sulje</button>
		  </div>
		</div>
	</div>
</div>
