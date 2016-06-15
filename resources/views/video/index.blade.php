@extends('layouts.master')

@section('content')
<div class="page-header">
  <h1>Videot</h1>
</div>

<div id="createbuttondiv">
  @include('video.create')
</div>

<table class="table table-bordered table-hover">

  <thead>
    <tr>
      <th width="120px">Kuvake</th>
      <th>Otsikko</th>
      <th>Kuvaus</th>
      <th>Muokkaus</th>
    </tr>
  </thead>
  
@foreach($videos as $video)
  <tr>
    <td>
      <img src="{{ $video->thumb }}"></img>
    </td>
   <td><a href="{!! action('VideoController@show', ['id' => $video->id]) !!}">{!! $video->title !!}</a></td>
   <td> {{ truncateString($video->desc, 50) }} </td>
    <td> @include('video.edit') </td>
  </tr>
@endforeach



</table>


@stop
