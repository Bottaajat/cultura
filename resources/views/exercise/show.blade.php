@extends('layouts.master')

@section('content')

<h1>
	{{ "Tehtävä: " . $exercise->name }}
</h1>

<div>
	<h3>{{ "Tehtävän materiaali" }}
	@foreach( $exercise->materials as $material )
		<p>
			{{ $material }}
		</p>
	@endforeach
</div>


<ul>
	<h3>
		{{ "Harjoituksia" }}
	</h3>
	@foreach($exercise->tasks as $task)
		<li>
			<a href="{{URL::to($exercise->exercise_level->name.'/'.$exercise->name.'/'.$task->name)}}">
				{{ $task->name }}
			</a>
		</li>
	@endforeach
</ul>

@stop