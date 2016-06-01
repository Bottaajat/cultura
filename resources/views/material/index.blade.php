@extends('layouts.master')

@section('content')
<div class="page-header">
  <h1>Materiaali</h1>
</div>

<table class="table table-hover">

  <thead>
    <tr>
      <th>#</th>
      <th>Nimi</th>
      <th>Harjoitus</th>
      <th>Tyyppi</th>
    </tr>
  </thead>

  <tbody>
    @foreach($materials as $material)
      <tr>
        <td>{!! $material->id !!}</td>
        <td>{!! $material->label !!}</td>
        <td>{!! $material->exercise->name !!}</td>
        <td>{!! $material->type !!}</td>
      </tr>
    @endforeach
  </tbody>

</table>

@stop
