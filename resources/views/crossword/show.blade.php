@section('pagehead')
	{{Html::style('/css/crossword.show.css')}}
	{{Html::script('/js/jquery-ui.min.js')}}
	{{Html::script('/js/crossword.task.js')}}
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
		
		<div id="puzzle_container">
			<table id="puzzle">
			</table>
		</div>

		<div id="hints_container">
			<h4>Pystysuoraan</h4>
				<div id="vertical_hints_container"></div>
			<h4>Vaakasuoraan</h4>
				<div id="horizontal_hints_container"></div>
		</div>
		
		<div id="buttons_container">
			<button id="clear" class="btn btn-warning" onclick=clear_all()>Tyhjennä</button>
			<button id="check" class="btn btn-success" onclick=check()>Tarkista</button>
		</div>

	</div>
</div>

<div class="btn btn-danger" id="btn" data-toggle="modal" data-target="#success">using jQuery click handler</div>

<?php

	$answers = '["'.str_replace(',', '","', implode(',', $answers)).'"]';
	$clues = '["'.str_replace(',', '","', implode(',', $clues)).'"]';
	$positions = '["'.str_replace(',', '","', implode(',', $positions)).'"]';
	$orientations ='["'.str_replace(',', '","', implode(',', $orientations)).'"]';
	echo '<script>init('.$answers.','.$clues.','.$positions.','.$orientations.')</script>';
	//echo '<script>test()</script>';
	
?>
