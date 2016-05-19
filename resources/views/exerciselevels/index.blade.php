@extends('layouts.master')
@section('content')

<div class="page-header">
	<h1>{{ "Aiheet" }}</h1>
</div>

<div class="list-group">
@foreach($levels as $level)
	<a href="{{URL::to($level->name)}}" class="list-group-item">{{$level->name}}</a>
@endforeach
</div>

@stop