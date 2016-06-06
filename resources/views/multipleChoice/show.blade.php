@section('pagehead')
  {!! Html::script("/js/multipleChoice.js") !!}
@stop

<div class="page-header">
	<h1>{!! $task->name !!}</h1>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title">{!! $task->type !!}</div>
	</div>
	<div class="panel-body" id="limit">
    @if($task->assignment)
		  {!! $task->assignment->content !!}
    @endif

<form onSubmit="checkSolutions(); return false;">
    @foreach($task->multiplechoises as $mc)
    <div name="question" class="form-group">
        <label>{!! $mc->id . ". " . $mc->question !!}</label>


        @foreach(stringToArray($mc->choices) as $key => $choice)
        <div class="radio">
          <label>
           <input type="radio" name="optionsRadios-{{$mc->id}}" id="optionsRadios-{{$mc->id}}-{{$key}}" value="{{ strcmp($choice, $mc->solution) }}">
            {{ $choice }}
          </label>
        </div>
        @endforeach

        <input id="hidden-{{$mc->id}}" type="hidden" value="{!! $mc->solution !!}">


    </div>
    @endforeach

    <div style="float:right, padding-top: 20px">
    	<button class="btn btn-primary" type="submit">Tarkista</button>
    	<a class="btn btn-info pull-right" href="{!! URL::to('/' .  $task->exercise->topic->name . '/' . $task->exercise->name ) !!}">Palaa harjoitukseen {{$task->exercise->name}} </a>
    </div>
  </form>


  </div>
</div>
