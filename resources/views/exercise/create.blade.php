@extends('layouts.master')

@section('content')

<div class="page-header">
	<h1>Harjoituksen lisäys</h1>
</div>

{{ Form::open(array('action'=> array('ExerciseController@store'), 'method'=>'POST')) }}
<form class="form-horizontal">
	<div class="form-group">
		<div class="col-sm-12">
			{!! Form::text('name', null, array('required', 'class'=>'form-control', 'placeholder'=>'Harjoituksen nimi')) !!}
		</div>
	</div>	
	<div class="form-group">
		<div class="col-sm-12">
			{!! Form::select('topic_id', $topic_list, null, ['class' => 'form-control']) !!}
		</div>
	</div>
	{!! Form::submit('Lisää',['class' => 'btn btn-primary']) !!}
	{!! Form::close() !!}
</form>

@stop