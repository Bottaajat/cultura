@section('pagehead')
	{{Html::script('/js/jquery-ui.min.js')}}
	{{Html::script('/js/filling.task.js')}}
	{{Html::style('/css/filling.show.css')}}
@stop

<div class="page-header">
	<h1>{{ $task->name }}</h1>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title">{{$task->type}}</div>
	</div>
	<div class="panel-body" id="limit">
		<div id="assignment">
			{{ $task->assignment->content}}
		</div>
		
		<div id="text">
		</div>
		
		<div id="buttons_container">
			<button id="clear" class="btn btn-warning" onclick=clear_all()>Tyhjennä</button>
			<button id="check" class="btn btn-success" onclick=check()>Tarkista</button>
		</div>

	</div>
</div>

<div class="btn btn-danger" id="btn" data-toggle="modal" data-target="#success">using jQuery click handler</div>

<?php

	//echo $text;
	echo '<script>fill("'.$text.'")</script>';
	//echo '<script>test()</script>';
	
?>
