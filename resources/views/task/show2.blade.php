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

<div id="content">
 
  <div id="droppablearea"> </div>
  <div id="draggablearea"> </div>

  <div id="successMessage">
    <h2>Oikein!</h2>
    <button onclick="init()">Kokeile uudestaan</button>
  </div>
 
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title">{{$task->type}}</div>
	</div>
	<div class="panel-body">
		<div class="droppablearea">
			<!--
			<div class="droptarget" ondrop="drop(event)" ondragover="allowDrop(event)" id="droptarget-a" data-target="a">
			
			</div>
			
			<div class="droptarget" ondrop="drop(event)" ondragover="allowDrop(event)" id="droptarget-b" data-target="b">
				
			</div>
			
			<div class="droptarget" ondrop="drop(event)" ondragover="allowDrop(event)" id="droptarget-c" data-target="c">
			
			</div>
			-->
		</div>
		<div class="draggablearea">
			<!--
			<p class="draggable" ondragstart="dragStart(event)" ondrag="dragging(event)" draggable="true" id="draggable-a">&#1072;</p>
			<p class="draggable" ondragstart="dragStart(event)" ondrag="dragging(event)" draggable="true" id="draggable-b">&#1073;</p>
			<p class="draggable" ondragstart="dragStart(event)" ondrag="dragging(event)" draggable="true" id="draggable-c">&#1074;</p>
			-->
		</div>
	</div>
</div>

@stop