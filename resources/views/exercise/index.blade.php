@extends('layouts.master')

@section('content')
<div class="page-header">
  <h1>Harjoitukset </h1>
</div>

@if(Auth::check())
  <div id="createbuttondiv">
    @include('exercise.create')
  </div>
@endif

<table class="table table-bordered">

  <thead>
    <tr>
      <th>#</th>
      <th>Nimi</th>
      <th>Taso</th>
      @if(Auth::check())
        <th>Harjoitus</th>
      @endif
      <th>Kuvaus</th>
      @if(Auth::check())
        <th>Kuvaus</th>
      @endif
    </tr>
  </thead>

  <tbody>
    @foreach($exercises as $exercise)
      <tr>
        <td>{!! $exercise->id !!}</td>
        <td><a href="{{route('exercise.show', ['id' => $exercise->id]) }}">{!! $exercise->name !!}</a></td>
        <td>{!! $exercise->topic->name !!}</td>
        @if(Auth::check())
          <td>@include('exercise.edit')</td>
        @endif
        <td>
          @if($exercise->descriptions)
            {{ truncateString($exercise->descriptions->content, 75) }}
          @endif
        </td>
        @if(Auth::check())
          <td>
            @if($exercise->descriptions)
              @include('description.edit')
            @else
              @include('description.create')
            @endif
          </td>
        @endif
      </tr>
    @endforeach
  </tbody>

</table>

@stop
