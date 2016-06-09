@section('pagehead')
	{{Html::script('/js/jquery-ui.min.js')}}
	{{Html::script('/js/filling.task.js')}}
	{{Html::script('/js/keyboard.js')}}
	{{Html::script('/js/virtual-keyboard.js')}}
	{{Html::script('/js/russian.js')}}
	
	{{Html::style('/css/filling.show.css')}}
	{{Html::style('/css/keyboard.css')}}
	
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
		<div id="glossary">
			@if($task->glossary)
				<table class="table table-striped table-bordered table-hover">
				<tr>
				  <th>Venäjäksi</th>
				  <th>Suomeksi</th>
				</tr>
				@foreach($task->glossary->get('rus','fin') as $rus => $fin)
				<tr>
					<td>{{ $rus }}</td>
					<td>{{ $fin }}</td>
				</tr>
				@endforeach
				</table>
			@endif
		</div>
		<div id="text">
		</div>
		<div id="buttons_container" style="padding:15px">
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
