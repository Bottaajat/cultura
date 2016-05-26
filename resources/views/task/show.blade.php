@extends('layouts.master')

@section('pagehead')
	{{Html::style('/css/task.show.css')}}
	{{Html::script('/js/order.task.js')}}
@stop

@section('content')

<div class="page-header">
	<h1>{{ $task->name }}</h1>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title">{{$task->type}}</div>
	</div>

	<div class="panel-body">
		@foreach($task->exercise->materials as $material)
			@if($material->type == "image")
			<div class="col-sm-2">
				<div class="thumbnail">
				<img id="droptarget-{{$material->id}}" src="{{$material->src}}" data-target="{{$material->id}}" class="droptarget" ondrop="drop(event)" ondragover="allowDrop(event)" height="64" width="64">
				</div>
			</div>
			@endif
			@if($material->type == "sound")
			<div class="col-sm-2">
				<div id="droptarget-{{$material->id}}" src="{{$material->src}}" data-target="{{$material->id}}" class="thumbnail"  style="height: 70px; width: 60px" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
			</div>
			@endif
		@endforeach
		@foreach($task->exercise->materials as $material)
			@if($material->type == "image")
			<div id="draggable-{{$material->id}}" class="draggable" ondragstart="dragStart(event)" ondrag="dragging(event)" draggable="true">	
				<div class="col-sm-2">
					<div class="thumbnail">
					{{$material->label}}
					</div>
				</div>
			</div>
			@endif
			@if($material->type == "sound")
			<div id="draggable-{{$material->id}}" class="draggable" ondragstart="dragStart(event)" ondrag="dragging(event)" draggable="true">	
				<div class="col-sm-2">
					<div class="thumbnail">
						{{$material->label}}
					</div>
				</div>
			</div>
			@endif
		@endforeach
</div>

@stop