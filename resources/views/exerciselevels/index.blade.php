@extends('layouts.master')
@section('content')

<ul>
@foreach($levels as $level)
<li>{{$level->name}}</li>
@endforeach
</ul>


@stop