@extends('layouts.master')

@section('content')

<br>

<h4>
Harjoituksen lisäys
</h4>

{!! Form::open(array('action'=> 'ExerciseController@store', 'method'=>'POST')) !!}
<form class="form-horizontal">
	<div class="form-group">
		{!! Form::label('Nimi', null, ['class' => 'control-label col-sm-2']) !!}
		<div class="col-sm-10">
			{!! Form::text('name', null, array('required', 'class'=>'form-control', 'placeholder'=>'harjoitus')) !!}
		</div>
	</div>	
	<div class="form-group">
		{!! Form::label('Aihe', null, ['class' => 'control-label col-sm-2']) !!}
		<div class="col-sm-10">
			{!! Form::select('topic', $topics, null, ['class' => 'form-control']) !!}
		</div>
	</div>
	{!! Form::submit('Lisää',['class' => 'btn btn-primary']) !!}
	{!! Form::close() !!}
</form>

@stop