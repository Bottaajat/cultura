@extends('layouts.master')

@section('content')


<form class="form-horizontal">
	
	<div class="form-group">
		<label for="exerciseName" class="col-sm-2 control-label">Harjoituksen nimi</label>
		<div class="col-sm-2">
			<input type="text" class="form-control" placeholder="harjoitus">
		</div>
	</div>

	<div class="form-group">
		<label for="topic" class="col-sm-2 control-label">Aihe</label>
		<select class="form-sm-2">
		@foreach($topics as $topic)
			<option>{{$topic->name}}</option>
		@endforeach
		</select>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-primary">{{"Luo harjoitus"}}</button>
		</div>
	</div>

</form> 

@stop