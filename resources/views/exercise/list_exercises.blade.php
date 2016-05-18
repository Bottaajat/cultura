@extends('layouts.master')

@section('content')

<h1>
	{{ strtoupper($exercises->first()->exercise_level->name) }}
</h1>

<ul>
	@foreach($exercises as $exercise)
		<li><a href="{{URL::to($exercise->exercise_level->name.'/'.$exercise->name)}}">{{$exercise->name}}</a></li>
	@endforeach
</ul>

@stop