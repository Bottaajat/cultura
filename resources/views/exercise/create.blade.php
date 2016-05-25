@extends('layouts.master')

@section('content')

<div class="page-header">
	<h1>Harjoituksen lisäys</h1>
</div>

{{ Form::open(array('action'=> array('ExerciseController@store'), 'method'=>'POST')) }}
<form accept-charset="UTF-8" class="form-horizontal">
	<div class="form-group">
		{!! Form::text('name', null, array('required', 'class'=>'form-control', 'placeholder'=>'Harjoituksen nimi')) !!}
	</div>	
	<div class="form-group">
		{!! Form::select('topic_id', $topic_list, null, ['class' => 'form-control']) !!}
	</div>
	{!! Form::submit('Lisää',['class' => 'btn btn-primary']) !!}
	{!! Form::close() !!}
</form>

@stop