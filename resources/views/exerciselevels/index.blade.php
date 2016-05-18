@extends('layouts.master')
@section('content')

<div class="page-header">
	<h1>{{ "Tehtävä tyypit" }}</h1>
</div>

<div class="list-group">
@foreach($levels as $level)
	<a href="{{URL::to($level->name)}}" class="list-group-item">{{$level->name}}</a>
@endforeach
</div>

@stop