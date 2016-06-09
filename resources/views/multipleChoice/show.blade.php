@section('pagehead')
  {!! Html::script("/js/multipleChoice.js") !!}
@stop


<form onSubmit="checkSolutions(); return false;">
    @foreach($task->multiplechoises as $mc)
    <div name="question" class="form-group">
        <label>{!! $mc->id . ". " . $mc->question !!}</label>


        @foreach($mc->randomOrderChoices() as $key => $choice)
        <div class="radio">
          <label>
           <input type="radio" name="optionsRadios-{{$mc->id}}" id="optionsRadios-{{$mc->id}}-{{$key}}" value="{{ strcmp($choice, $mc->solution) }}">
            {{ $choice }}
          </label>
        </div>
        @endforeach


    </div>
    @endforeach

    <div class="panel-body">
    	<button class="btn btn-success" type="submit">Tarkista</button>
    </div>
</form>
