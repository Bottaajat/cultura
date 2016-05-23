@extends('layouts.master')
@section('content')
<div class="page-header">
  <h1>{{ $exercise->name }}</h1>
</div>

{{-- Materiaalinäkymä --}}
<div class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapseMat">Materiaali</a>
      </h4>
    </div>
    <div id="collapseMat" class="panel-collapse collapse in">
      <div class="panel-body">
        @foreach( $exercise->materials as $material )
        <h4 class="list-group-item-heading">{{$material->label}}</h4>
        <p class="list-group-item-text">{{$material->contents}}</p>
        @endforeach
      </div>
    </div>
  </div>
</div>


{{-- Tehtävät --}}
<div class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapseExer">Tehtävät</a>
      </h4>
    </div>
    <div id="collapseExer" class="panel-collapse collapse in">
      <div class="list-group">
        @foreach($exercise->tasks as $task)
        <a href="{{URL::to($exercise->topic->name.'/'.$exercise->name.'/'.$task->name)}}" class="list-group-item"> {{ $task->name }} </a>
        @endforeach
      </div>
    </div>
  </div>
</div>


@stop