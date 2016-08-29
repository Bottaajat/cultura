@extends('layouts.master')

@section('pagehead')
  {{ Html::script("/js/arrow.js") }}
  {{ Html::script("/js/playaudio.js") }}
@stop

@section('content')

<div class="page-header">
  <h1>{{ $exercise->name }}</h1>
</div>

@if(Auth::check() && checkMembership(Auth::user(), $exercise->school))
<div class="createbuttondiv">
  <div class="row">
    <div class="col-xs-6 .col-sm-4 pull-right">
      @include('material.create')
    </div>
  </div>
</div>
@endif

@include('material.show')

{{-- Tehtävät --}}
<div class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading"  data-toggle="collapse" data-target='#collapseExer'>
      <h4 class="panel-title">
        <div id="menu-2-toggle">
          Tehtävät
          <i id=panelarrow class="glyphicon glyphicon-triangle-bottom pull-right"></i>
        </div>
      </h4>
    </div>
    <div id="collapseExer" class="panel-collapse collapse in">
      <div class="list-group">
        @foreach($exercise->tasks as $task)
        <a href="{!! action('TaskController@show', ['id' => $task->id]) !!}" class="list-group-item"> {{ $task->name }} </a>
        @endforeach
      </div>
    </div>
  </div>
</div>

@stop
