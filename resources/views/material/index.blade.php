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
      <th></th>
      <th></th>
    </tr>
  </thead>

  <tbody data-link="row" class="rowlink">
    @foreach($materials as $material)
      <tr>
        <td><a href="{!! URL::to('/' . $material->exercise->topic->name . '/' . $material->exercise->name) !!}">{!! $material->id !!}</a></td>
        <td>{!! $material->label !!}</td>
        <td>{!! $material->exercise->name !!}</td>
        <td>{!! $material->type !!}</td>
        <td>
          <button type="button" class="btn btn-info center-block">
            <span class="glyphicon glyphicon-pencil"></span>
          </button>
        </td>
        <td>
          <button type="button" class="btn btn-danger pull-right">
            <span class="glyphicon glyphicon-remove"></span>
          </button>
        </td>
      </tr>
    @endforeach
  </tbody>

</table>

@stop
