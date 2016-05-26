@extends('layouts.master')

@section('content')

<div class="page-header">
	<h1>{{ $task->name }}</h1>
</div>

<style>

.alphabet-area {
    width: 100%; 
    height: 30px;
    margin: 15px;
    padding: 10px;
    border: 1px solid #aaaaaa;
}

</style>

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
		<div>
			<img src="/img/kakku.gif" class="droptarget" ondrop="drop(event)" ondragover="allowDrop(event)" id="droptarget-a" data-target="a">
			
			<img src="/img/kitara.gif" class="droptarget" ondrop="drop(event)" ondragover="allowDrop(event)" id="droptarget-b" data-target="b">

			<img src="/img/vaasi.gif" class="droptarget" ondrop="drop(event)" ondragover="allowDrop(event)" id="droptarget-c" data-target="c">
		</div>
		<div>
			<p class="draggable" ondragstart="dragStart(event)" ondrag="dragging(event)" draggable="true" id="draggable-a">торт</p>
			<p class="draggable" ondragstart="dragStart(event)" ondrag="dragging(event)" draggable="true" id="draggable-b">гитара</p>
			<p class="draggable" ondragstart="dragStart(event)" ondrag="dragging(event)" draggable="true" id="draggable-c">ваза</p>
		</div>
	</div>
	
</div>

<script>

function dragStart(event) {
    event.dataTransfer.setData("Text", event.target.id);
	//alert("dragging: " + event.target.id);
}

function allowDrop(event) {
    event.preventDefault();
}

function drop(event) {
    event.preventDefault();
    var data = event.dataTransfer.getData("Text");
	var drag_id = data.split("-");
	var drop_id = (event.target.id).split("-");
	if (drag_id[1] == drop_id[1]) {
		event.target.appendChild(document.getElementById(data));
		var element = event.target.id;
		document.getElementById(element).style.border = "1px solid #00FF00";
	}
}

</script>

@stop