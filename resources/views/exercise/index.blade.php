@extends('layouts.master')

@section('content')
<div class="page-header">
  <h1>Harjoitukset</h1>
</div>

<table class="table table-bordered">

  <thead>
    <tr>
      <th>#</th>
      <th>Nimi</th>
      <th>Taso</th>
      <th>Kuvaus</th>
      <th>Kuvauksen Muokkaus</th>
    </tr>
  </thead>

  <tbody>
    @foreach($exercises as $exercise)
      <tr>
        <td>{!! $exercise->id !!}</td>
        <td>{!! $exercise->name !!}</td>
        <td>{!! $exercise->topic->name !!}</td>
        <td>
          @if($exercise->descriptions)
            {{ truncateString($exercise->descriptions->content, 75) }}
          @endif
        </td>
        <td>
          @if($exercise->descriptions)
            @include('description.edit')
          @else
            @include('description.create')
          @endif
        </td>
      </tr>
    @endforeach
  </tbody>

</table>

@stop
