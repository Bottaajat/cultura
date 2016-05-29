@extends('layouts.master')

@section('pagehead')
	{{Html::style('/css/tmp.show.css')}}
	{{Html::script('/js/jquery-ui.min.js')}}
	{{Html::script('/js/touch.js')}}
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
		<!--
		<div id="successMessage" class="col-sm-12">
			<h2>Oikein!</h2>
			<button onclick=location.reload()>Kokeile uudestaan</button>
		</div>
		-->
	</div>
</div>

<div class="btn btn-danger" id="btn" data-toggle="modal" data-target="#success">using jQuery click handler</div>

<div id="success" class="modal fade">
	<div class="modal-dialog">

		<div class="modal-content">
		  <div class="modal-header">
			<!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
			<h4 class="modal-title">Tehtävä suoritettu</h4>
		  </div>
		  <div class="modal-body">
			<p>Onneksi olkoon!</p>
		  </div>
		  <div class="modal-footer">
			<!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
			<button onclick=location.reload()>Kokeile uudestaan</button>
		  </div>
		</div>

	</div>
</div>

@stop