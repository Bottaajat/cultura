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

	<form id="form">
    @foreach($task->multiplechoises as $mc)
    <div class="form-group">
        <label>{!! $mc->id . ". " . $mc->question !!}</label>
        
        <input id="hidden-{{$mc->id}}" type="hidden" value="{!! $mc->solution !!}">

        @foreach(stringToArray($mc->choices) as $key => $choice)
        <div class="has-success">
          <div class="radio">
            <label>
              <!-- id="optionsRadios-{{$mc->id}}-{{$key}}" -->
              <input type="radio" name="optionsRadios-{{$mc->id}}"  value="{{$choice}}">
              {{$choice}}
            </label>
          </div>
        </div>
        @endforeach

    </div>
    @endforeach

    <button class="btn btn-primary" type="submit">Tarkista</button>

  </form>


  </div>
</div>
