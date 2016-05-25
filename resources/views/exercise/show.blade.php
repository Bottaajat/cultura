@extends('layouts.master')

@section('pagehead')
  {{ Html::script("/js/arrow.js") }}
  {{ Html::script("/js/playaudio.js") }}
@stop

@section('content')

<div class="page-header">
  <h1>{{ $exercise->name }}</h1>
</div>

{{-- Materiaalinäkymä --}}
<div class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <div id="menu-1-toggle" data-toggle="collapse" href="#collapseMat">
          Materiaali <i class="glyphicon glyphicon-triangle-bottom"></i>
      </div>
      </h4>
    </div>
    <div id="collapseMat" class="panel-collapse collapse in">
      <div class="panel-body">
        @foreach( $exercise->materials as $material )
          @if($material->type == "info")
          <h4 class="list-group-item-heading">{{$material->label}}</h4>
          <p class="list-group-item-text">{{$material->contents}}</p>
          @endif
          @if($material->type == "sound")
          <button class="btn btn-primary" onClick="playAudio('{{$material->src}}',this)">
            {{$material->label}} <br>
            {{$material->contents}}
            <div id="embed"></div>
          </button>
          @endif
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
        <div id="menu-2-toggle" data-toggle="collapse" href="#collapseExer">
          Tehtävät <i class="glyphicon glyphicon-triangle-bottom"></i>
        </div>
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