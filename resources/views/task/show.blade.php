@extends('layouts.master')

@section('pagehead')
	{{Html::style('/css/tmp.show.css')}}
	{{Html::script('/js/jquery-ui.min.js')}}
	{{Html::script('/js/tmp.task.js')}}
{{-- {{Html::style('/css/task.show.css')}}
	{{Html::script('/js/order.task.js')}} --}}
@stop

@section('stuff')
	onLoad="asd({{$task->exercise->materials->where('type', 'sound')->pluck('label')}},
			{{$task->exercise->materials->where('type', 'sound')->pluck('contents')}})"
@stop

@section('content')

<div class="page-header">
	<h1>{{ $task->name }}</h1>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title">{{$task->type}}</div>
	</div>
	<div class="panel-body" id="limit">
	
		<div id="droppablearea" class="panel-body"> </div>
		<div id="draggablearea" class="panel-body"> </div>
		
		<div id="successMessage">
			<h2>Oikein!</h2>
			<button onclick="asd.init">Kokeile uudestaan</button>
		</div>
		
	</div>
</div>

@stop