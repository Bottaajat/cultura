@section('pagehead')
	{{Html::style('/css/crossword.show.css')}}
	{{Html::script('/js/jquery-ui.min.js')}}
	{{Html::script('/js/crossword.task.js')}}
@stop

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

<div id="buttons_container" class="panel-body">
	<button id="clear" class="btn btn-warning" onclick=clear_all()>Tyhjennä</button>
	<button id="check" class="btn btn-success" onclick=check()>Tarkista</button>
</div>

<?php

	$answers = '["'.str_replace(',', '","', implode(',', $answers)).'"]';
	$clues = '["'.str_replace(',', '","', implode(',', $clues)).'"]';
	$positions = '["'.str_replace(',', '","', implode(',', $positions)).'"]';
	$orientations ='["'.str_replace(',', '","', implode(',', $orientations)).'"]';
	echo '<script>init('.$answers.','.$clues.','.$positions.','.$orientations.')</script>';
	//echo '<script>test()</script>';
	
?>
