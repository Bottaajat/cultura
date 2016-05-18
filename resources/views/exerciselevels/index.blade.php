@extends('layouts.master')
@section('content')

<div>
<h1>
	{{ "Tehtävä tyypit" }}
</h1>
</div>

<div>
<ul>
	@foreach($levels as $level)
		<li>
			<a href="{{URL::to($level->name)}}">{{$level->name}}</a>
		</li>
	@endforeach
</ul>
</div>

@stop