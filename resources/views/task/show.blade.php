@extends('layouts.master')

@section('content')

@if(dirname($task->type) == 'järjestys')
	@include('ordering.show')
@endif

@if($task->type == 'Monivalinta')
	@include('multipleChoice.show')
@endif

@if($task->type == 'Sanaristikko')
	@include('crossword.show')
@endif

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
