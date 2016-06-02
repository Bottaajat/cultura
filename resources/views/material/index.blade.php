@extends('layouts.master')

@section('content')
<div class="page-header">
  <h1>Materiaali</h1>
</div>

<table class="table table-bordered table-hover">

  <thead>
    <tr>
      <th>#</th>
      <th>Nimi</th>
      <th>Harjoitus</th>
      <th>Tyyppi</th>
      <th>Muokkaa</th>
      <th>Poista</th>
    </tr>
  </thead>

  <tbody data-link="row" class="rowlink">
    @foreach($materials as $material)
      <tr>
        <td><a href="{!! URL::to('/' . $material->exercise->topic->name . '/' . $material->exercise->name) !!}">{!! $material->id !!}</a></td>
        <td>{!! $material->label !!}</td>
        <td>{!! $material->exercise->name !!}</td>
        <td>{!! $material->type !!}</td>
        <td class="rowlink-skip">
          @include('material.edit')
        </td>
        <td class="rowlink-skip">
          @include('material.destroy')
        </td>
      </tr>
    @endforeach
  </tbody>

</table>

@stop