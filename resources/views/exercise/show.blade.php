@extends('layouts.master')

@section('content')

<div class="page-header">
	<h1>{{ "Harjoitus: " . $exercise->name }}</h1>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title">{{ "Harjoituksen materiaali" }}</div>
	</div>
	<div class="panel-body">
		<div class="list-group">
		@foreach( $exercise->materials as $material )
			<h4 class="list-group-item-heading">{{$material->label}}</h4>
			<p class="list-group-item-text">{{$material->contents}}</p>
		@endforeach
		</div>
	</div>
</div>


<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title">{{ "Harjoituksen tehtävät" }}</div>
	</div>
	<div class="panel-body">
		<div class="list-group">
		@foreach($exercise->tasks as $task)
			<a href="{{URL::to($exercise->exercise_level->name.'/'.$exercise->name.'/'.$task->name)}}" class="list-group-item">
				{{ $task->name }}
			</a>
		@endforeach
		</div>
	</div>
</div>

@stop