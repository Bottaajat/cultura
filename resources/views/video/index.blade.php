@extends('layouts.master')

@section('content')
<div class="page-header">
  <h1>Videot</h1>
</div>

@if(Auth::check() && belongsToSchool(Auth::user()))
  <div class="createbuttondiv">
    @include('video.create')
  </div>
@endif


<div class="table-responsive">
<table class="table table-bordered table-hover">

  <thead>
    <tr>
      <th width="120px">Kuvake</th>
      <th width="300px">Otsikko</th>
      <th>Kuvaus</th>
      <th width="120px">Tehtäviä</th>
      @if(Auth::check() && belongsToSchool(Auth::user()))
        <th width="120px">Muokkaus</th>
      @endif
    </tr>
  </thead>

  <tbody data-link="row" class="rowlink">
@foreach($videos as $video)
  <tr>
    <td>
      <img src="{!! $video->thumb !!}"></img>
    </td>
    <td>
      @if($video->tasks()->count() == 1)
        <a href="{!! action('TaskController@show', ['id' => $video->tasks()->first()->id]) !!}">
          {!! $video->title !!}
        </a>
      @else
        <a href="{!! action('VideoController@show', ['id' => $video->id]) !!}">
          {!! $video->title !!}
        </a>
      @endif
    </td>

    <td> {!! truncateString($video->desc, 50) !!} </td>
    <td class="center-align rowlink-skip">

      @if($video->tasks()->count() > 0)
        @include('video.exerciseModal')
      @else
        <button type="button"
                class="btn btn-danger btn-lg"
                data-toggle="modal"
                data-target="#noExerModal">
        0
        </button>
      @endif
    </td>
    @if(Auth::check() && belongsToSchool(Auth::user()))
      <td class="center-align rowlink-skip">
        @if(checkMembership(Auth::user(), $video->school))
          @include('video.edit')
        @else
          <button type="button" class="btn btn-primary disabled">
            <i class="glyphicon glyphicon-pencil"></i>
              Muokkaa
          </button>
        @endif
      </td>
    @endif
  </tr>
@endforeach

</table>
</div>

<div class="modal fade" id="noExerModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title"> Videolla ei ole tehtäviä</h4>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
      </div>

    </div>
  </div>
</div>


@stop
