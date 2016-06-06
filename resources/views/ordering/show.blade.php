@section('pagehead')
	{{Html::style('/css/tmp.show.css')}}
	{{Html::script('/js/jquery-ui.min.js')}}
	{{Html::script('/js/touch.js')}}
@stop

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
		@if($task->assignment)
		  {!! $task->assignment->content !!}
    @endif
		<div id="droppablearea" class="panel-body"> </div>
		<div id="draggablearea" class="panel-body"> </div>

		<div style="float:right, padding-top: 20px">
			<button class="btn btn-primary" onclick=location.reload()>Aloita alusta</button>
			<a class="btn btn-info pull-right" href="{!! URL::to('/' .  $task->exercise->topic->name . '/' . $task->exercise->name ) !!}">Palaa harjoitukseen {{$task->exercise->name}} </a>
		</div>
	</div>
</div>



<div class="btn btn-danger" id="btn" data-toggle="modal" data-target="#success">using jQuery click handler</div>
