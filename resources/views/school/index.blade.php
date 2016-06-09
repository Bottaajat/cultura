@extends('layouts.master')

@section('content')
<div class="page-header">
  <h1>Koulut</h1>
</div>

<div id="createbuttondiv">
  @include('school.create')
</div>

<table class="table table-bordered table-hover">

  <thead>
    <tr>
      <th>#</th>
      <th>Koulun nimi</th>
      <th>Editoi</th>
    </tr>
  </thead>

  <tbody>
    @foreach($schools as $school)
      <tr>
        <td>{!! $school->id !!}</td>
        <td>{!! $school->name !!}</td>
        <td>@include('school.edit')</td>
      </tr>
    @endforeach
  </tbody>

</table>

@stop
