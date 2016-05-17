@extends('layouts.master')
@section('content')

<ul>
@foreach($levels as $level)
<li><a href="{{URL::to($level->name)}}">{{$level->name}}</a></li>
@endforeach
</ul>


@stop