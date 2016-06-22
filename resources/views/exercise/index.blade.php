@extends('layouts.master')

@section('content')
<div class="page-header">
  <h1>Harjoitukset </h1>
</div>

@if(Auth::check())
  <div class="createbuttondiv">
    @include('exercise.create')
  </div>
@endif

<div class="table-responsive">
<table class="table table-bordered table-hover">

  <thead>
    <tr>
      <th>#</th>
      <th>Nimi</th>
      <th>Taso</th>
      <th>Kuvaus</th>
      @if(Auth::check())
        <th>Harjoitus</th>
      @endif
    </tr>
  </thead>

  <tbody data-link="row" class="rowlink">
    @foreach($exercises as $exercise)
      <tr>
        <td>{!! $exercise->id !!}</td>
        <td><a href="{{route('exercise.show', ['id' => $exercise->id]) }}">{!! $exercise->name !!}</a></td>
        <td>{!! $exercise->topic->name !!}</td>
        <td>
          @if($exercise->description)
            {{ truncateString($exercise->description, 75) }}
          @endif
        </td>
        @if(Auth::check())
          <td class="rowlink-skip">@include('exercise.edit')</td>
        @endif
      </tr>
    @endforeach
  </tbody>

</table>
</div>

@stop
