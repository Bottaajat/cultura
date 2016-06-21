@extends('layouts.master')

@section('pagehead')
  <script src="/js/arrow.js" type="text/javascript"></script>
@stop

@section('content')

@if($topics->isEmpty())
  @include('errors.db')

@else
<div class="page-header">
  <h1>
    Aiheet
  </h1>
</div>



<div class="row">
@foreach($topics as $topic)
  <div class="col-xs-12 col-sm-6 col-md-6">
  <h4 class="list-group-item-heading">
    {{ $topic->name }}
  </h4>
  <div class="list-group">
  @foreach($topic->exercises as $exercise)
    <a href="{!! action('ExerciseController@show', ['id' => $exercise->id])!!}" 
       class="list-group-item">
          {{ $exercise->name }}
    </a>
  @endforeach
  </div>
  </div>
@endforeach
</div>


@endif

<a href="http://www.culturas.fi/">
  <img id="culturas-logo" class="img-rounded center-block" alt="Responsive image" src="/img/juhlarahasto.png" height=200px widht=200px>
</a>

@stop
