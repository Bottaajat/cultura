@extends('layouts.master')

@section('content')
<div class="page-header">
  <h1>Videot</h1>
</div>

@if(Auth::check())
  <div class="createbuttondiv">
    @include('video.create')
  </div>
@endif


<table class="table table-bordered table-hover">

  <thead>
    <tr>
      <th width="120px">Kuvake</th>
      <th>Otsikko</th>
      <th>Kuvaus</th>
      <th width="120px">Tehtäviä</th>
      @if(Auth::check()) 
        <th width="120px">Muokkaus</th> 
      @endif
    </tr>
  </thead>
  
@foreach($videos as $video)
  <tr>
    <td>
      <img src="{!! $video->thumb !!}"></img>
    </td>
    <td>
      @if($video->tasks()->count() == 1)
        <a href="{!! action('TaskController@show', ['id' => $video->tasks()->first()->id]) !!}">{!! $video->title !!}</a>
      @else
        <a href="{!! action('VideoController@show', ['id' => $video->id]) !!}">{!! $video->title !!}</a>
      @endif
      
    </td>
    <td> {!! truncateString($video->desc, 50) !!} </td>
    <td class="center-align"> 
      @if($video->tasks()->count() > 0)
        @include('video.exerciseModal')      
      @else
        <button type="button" class="btn btn-danger btn-lg">0</button>
      @endif
    </td>
    @if(Auth::check()) 
      <td class="center-align"> @include('video.edit') </td>
    @endif
  </tr>
@endforeach



</table>


@stop
