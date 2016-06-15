@extends('layouts.master')

@section('content')
<div class="page-header">
  <h1>{!! $video->title !!}</h1>
</div>

@if(Auth::user())
<div id="createbuttondiv">
  @include('video.edit')
</div>
@endif


<iframe 
    width="1280" height="720" 
    src="https://www.youtube.com/embed/{{ $video->emb_src }}"
    frameborder="0" allowfullscreen>
 </iframe>
 

@stop
