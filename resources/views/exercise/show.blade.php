@extends('layouts.master')

@section('content')

<h1>
	{{ $exercise->name }}
</h1>

{{-- 
<div>
	@foreach( $exercise->materials as $material )
		<p>

		</p>
	@endforeach
</div> --}}


<ul>
	@foreach($exercise->tasks as $task)
		<li>
			<a href="{{URL::to($exercise->exercise_level->name.'/'.$exercise->name.'/'.$task->name)}}">
				{{ $task->name }}
			</a>
		</li>
	@endforeach
</ul>

@stop