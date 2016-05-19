@extends('layouts.master')

@section('content')

<div class="page-header">
	<h1>{{ $exercises->first()->exercise_level->name }}</h1>
</div>

<div class="list-group">
@foreach($exercises as $exercise)
	<a href="{{URL::to($exercise->exercise_level->name.'/'.$exercise->name)}}" class="list-group-item">
		{{$exercise->name}}
	</a>
@endforeach
</div>

@stop