@extends('layouts.master')

@section('pagehead')
	{{Html::style('/css/tmp.show.css')}}
	{{Html::script('/js/jquery-ui.min.js')}}
	{{Html::script('/js/touch.js')}}
{{-- {{Html::style('/css/task.show.css')}}
	{{Html::script('/js/order.task.js')}} --}}
@stop

@section('content')

<div class="page-header">
	<h1>{{ $task->name }}</h1>
</div>

<?php

	if ($task['type']=='järjestys/sanat') echo'<script src="/js/order.text.task.js"></script>';
	if ($task['type']=='järjestys/kuvat') echo'<script src="/js/order.image.task.js"></script>';
	echo '<script>asd(["'.str_replace(',', '","', implode(',', $draggables)).'"],["'.str_replace(',', '","', implode(',', $droppables)).'"],["'.str_replace(',', '","', implode(',', $showables)).'"],["'.str_replace(',', '","', implode(',', $srcs)).'"])</script>';

?>

<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title">{{$task->type}}</div>
	</div>
	<div class="panel-body" id="limit">
		<div id="droppablearea" class="panel-body"> </div>
		<div id="draggablearea" class="panel-body"> </div>
	</div>
</div>

<div style="float:right, padding-top: 20px">
	<button class="btn btn-primary" onclick=location.reload()>Aloita alusta</button>
</div>

<div class="btn btn-danger" id="btn" data-toggle="modal" data-target="#success">using jQuery click handler</div>

<div id="success" class="modal fade">
	<div class="modal-dialog">

		<div class="modal-content">
		  <div class="modal-header">
			<!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
			<h4 class="modal-title">Onneksi olkoon! Tehtävä suoritettu.</h4>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Sulje</button>
			<button class="btn btn-primary" onclick=location.reload()>Kokeile uudestaan</button>
		  </div>
		</div>

	</div>
</div>

@stop