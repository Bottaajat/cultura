@extends('layouts.master')

@section('content')

@if(dirname($task->type) == 'järjestys')
	@include('ordering.show')
@endif

@stop
