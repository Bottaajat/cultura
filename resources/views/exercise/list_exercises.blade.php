@extends('layouts.master')

@section('content')

<ul>
	@foreach($exercises as $exercise)
		<li><a href="{{URL::to($exercise->exercise_level->name.'/'.$exercise->name)}}">{{$exercise->name}}</a></li>
	@endforeach
</ul>

@stop