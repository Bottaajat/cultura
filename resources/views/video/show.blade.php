@extends('layouts.master')

@if (isset($video) && $video)
  @section('content')
  
  <div class="page-header">
    <h1> {{ $video->title }}</h1>
  </div>
  
  
  <div class="embed-responsive embed-responsive-16by9">
    <iframe 
        width="100%" 
        src="https://www.youtube.com/embed/{{ $video->emb_src }}"
        frameborder="0" allowfullscreen="true">
     </iframe>
   </div>
   
  <div class="page-header"></div>
  {{ $video->desc }}
  
  @if ($video->tasks()->count() > 0)
  
  <div class="page-header">
    <h2> Tehtävät </h2>
  </div>
  
  <ul class="list-group">
  @foreach($video->tasks()->get() as $task)
    <a class="list-group-item" href="{!! action('TaskController@show', ['id' => $task->id]) !!}">
      <h4> {!! $task->name !!} </h4>
    </a>
  @endforeach
  </ul>
  @endif
@else
  <h1>Virheellinen video :(</h1>
@endif
@stop
  
