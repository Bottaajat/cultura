
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

	<form>
    @foreach($task->multiplechoises as $mc)
    <div class="form-group">
        <label>{!! $mc->id . ". " . $mc->question !!}</label>

        @foreach(stringToArray($mc->choices) as $key => $choice)
        <div class="radio">
          <label>
            <input type="radio" name="optionsRadios-{{$mc->id}}" id="optionsRadios-{{$mc->id}}-{{$key}}" value="{{$choice}}">
            {{$choice}}
          </label>
        </div>
        @endforeach

        <input id="hidden-{{$mc->id}}" type="hidden" value="{!! $mc->solution !!}">
    </div>
    @endforeach

    <button class="btn btn-primary" id="checkResults">Tarkista</button>

  </form>


  </div>
</div>
