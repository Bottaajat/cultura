@extends('layouts.master')

@section('pagehead')
  <script src="/js/arrow.js" type="text/javascript"></script>
@stop

@section('content')


<div class="page-header">
<div class="row">
<div class="container">
  <h1>
    <div class="pull-left">
      Aiheet
    </div>
  </h1>
</div>
</div>
</div>



<div class="panel-group" id="accordion">
@foreach($topics as $topic)

<div class="panel panel-default">

{{-- Header (Topic) --}}
<div class="panel-heading"  data-toggle="collapse" data-parent="#accordion" data-target='{{"#collapse".$topic->id}}'>
  <h4 class="panel-title">
    <a id="menu-{{$topic->id}}-toggle" >
      {{$topic->name}}
      <i id=panelarrow class="glyphicon glyphicon-triangle-left pull-right"></i>
    </a>
  </h4>
</div>

{{-- Header (Exercises) --}}
<div id='{{"collapse".$topic->id}}' class="panel-collapse collapse">
  <div class="list-group">
    @foreach($topic->exercises as $exercise)
    <div class="container-fluid list-group-item">
      <div class="row">
        <div class="pull-left">
          <a class="list-group-item" style="margin-left:10px" href="{{URL::to($topic->name.'/'.$exercise->name)}}"> {{$exercise->name}} </a>
        </div>
        <div class="pull-right" style="margin-right:5px">
          @include('exercise.destroy')
        </div>
        <div class="pull-right" style="margin-right:5px">
          @include('exercise.edit')
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

</div>

@endforeach
</div>

@stop
