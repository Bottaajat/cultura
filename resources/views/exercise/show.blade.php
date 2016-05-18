@extends('layouts.master')

@section('content')

<ul>
@foreach($exercise->tasks as $task)
<li><a href="{{URL::to($exercise->exercise_level->name.'/'.$exercise->name.'/'.$task->name)}}">{{$task->name}}</a></li>
@endforeach
</ul>

@stop