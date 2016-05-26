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
	<!--
	<div class="panel-body">
		<div>
			<div class="droptarget" ondrop="drop(event)" ondragover="allowDrop(event)" id="droptarget-a" data-target="a">
			
			</div>
			
			<div class="droptarget" ondrop="drop(event)" ondragover="allowDrop(event)" id="droptarget-b" data-target="b">
				
			</div>
			
			<div class="droptarget" ondrop="drop(event)" ondragover="allowDrop(event)" id="droptarget-c" data-target="c">
			
			</div>
		</div>
		<div>
			<p class="draggable" ondragstart="dragStart(event)" ondrag="dragging(event)" draggable="true" id="draggable-a">&#1072;</p>
			<p class="draggable" ondragstart="dragStart(event)" ondrag="dragging(event)" draggable="true" id="draggable-b">&#1073;</p>
			<p class="draggable" ondragstart="dragStart(event)" ondrag="dragging(event)" draggable="true" id="draggable-c">&#1074;</p>
		</div>
		
	</div>
	-->
	<div class="panel-body">
		@foreach($task->exercise->materials as $material)
		<div class="col-sm-2">
			<div class="thumbnail">
			@if($material->type == "image")
				<img id="droptarget-{{$material->id}}" src="{{$material->src}}" data-target="{{$material->id}}" class="droptarget" ondrop="drop(event)" ondragover="allowDrop(event)" height="64" width="64">
			@endif
			</div>
		</div>
		@endforeach
		@foreach($task->exercise->materials as $material)
		<div class="col-sm-2">
			<div class="thumbnail">
			@if($material->type == "image")
				<div id="draggable-{{$material->id}}" class="draggable" ondragstart="dragStart(event)" ondrag="dragging(event)" draggable="true">
					{{$material->label}}
				</div>
			@endif
			</div>
		</div>
		@endforeach
	</div>
</div>

@stop