@extends('layouts.master')

@section('content')

@if(dirname($task->type) == 'järjestys')
	@include('ordering.show')
@endif

@if($task->type == 'Monivalinta')
	@include('multipleChoice.show')
@endif

@if($task->type == 'Sanaristikko')
	@include('crossword.show')
@endif

@stop
