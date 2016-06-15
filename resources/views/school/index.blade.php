@extends('layouts.master')

@section('content')
<div class="page-header">
  <h1>Koulut</h1>
</div>

@if(Auth::user() && Auth::user()->is_admin)
<div id="createbuttondiv">
  @include('school.create')
</div>
@endif

<table class="table table-bordered table-hover">

  <thead>
    <tr>
      <th>#</th>
      <th>Koulun nimi</th>
      @if(Auth::user() && Auth::user()->is_admin)
        <th>Editoi</th>
      @endif
    </tr>
  </thead>

  <tbody data-link="row" class="rowlink">
    @foreach($schools as $school)
      <tr>
        <td><a href="{!! action('SchoolController@show', ['id' => $school->id]) !!}">{!! $school->id !!}</a></td>
        <td>{!! $school->name !!}</td>
        @if(Auth::user() && Auth::user()->is_admin)
          <td>@include('school.edit')</td>
        @endif
      </tr>
    @endforeach
  </tbody>

</table>

@stop
