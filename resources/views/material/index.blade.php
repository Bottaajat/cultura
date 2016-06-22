@extends('layouts.master')

@section('content')
<div class="page-header">
  <h1>Materiaali</h1>
</div>

<div class="createbuttondiv">
  <div class="row">

    <div class="col-xs-6 .col-sm-4 pull-right">
      @include('material.create')
    </div>

    <div class="col-xs-6 .col-sm-4">
      {!! Form::open(array('action'=>array('MaterialController@index'), 'method'=>'get')) !!}
      <div class="input-group">
        {!! Form::text('search', (isset($search) ? $search : ''), array('class' => ' form-control', 'placeholder'=>'Haku')) !!}
        <span class="input-group-btn">
          {!! Form::submit('Hae', array('class' => 'btn btn-primary')) !!}
        </span>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>

<div class="table-responsive">
<table class="table table-bordered table-hover">

  <thead>
    <tr>
      <th>#</th>
      <th>Nimi</th>
      <th>Harjoitus</th>
      <th>Tyyppi</th>
      <th width="150px">Materiaali</th>
      <th width="150px">Sanasto</th>
    </tr>
  </thead>

  <tbody data-link="row" class="rowlink">
    @foreach($materials as $material)
      <tr>
        <td><a href="{!! action('ExerciseController@show', ['id' => $material->exercise->id]) !!}">{!! $material->id !!}</a></td>
        <td>{!! $material->label !!}</td>
        <td>{!! $material->exercise->name !!}</td>

        <td>{!! mb_ucfirst(trans('type.' . $material->type)) !!}</td>
        <td class="rowlink-skip">

          @include('material.edit')
        </td>
        <td class="rowlink-skip center-align">
          @if($material->glossary)
            @include('glossary.edit')
          @else
            @include('glossary.create')
          @endif
        </td>
      </tr>
    @endforeach
  </tbody>

</table>
</div>

<div class="paginationdiv">
  @include('pagination.default', ['paginator' => $materials])
</div>

@stop
