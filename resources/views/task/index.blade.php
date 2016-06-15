@extends('layouts.master')

@section('content')
<div class="page-header">
  <h1>Tehtävät </h1>
</div>

@if(Auth::check())
  <div id="createbuttondiv">
    <!-- @include('task.create') -->
  </div>
@endif

<table class="table table-bordered">

  <thead>
    <tr>
      <th>#</th>
      <th>Nimi</th>
      <th>Harjoitus</th>
      @if(Auth::check())
        <th>Tehtävä</th>
      @endif
      <th>Tehtävänanto</th>
      @if(Auth::check())
        <th>Kuvaus</th>
      @endif
    </tr>
  </thead>

  <tbody>
    @foreach($tasks as $task)
      <tr>
        <td>{!! $task->id !!}</td>
        <td><a href="{{route('task.show', ['id' => $task->id]) }}">{!! $task->name !!}</a></td>
        <td>{!! $task->name !!}</td>
        @if(Auth::check())
         <!-- <td>@include('task.edit')</td> -->
        @endif
        <td>
          @if($task->assignment)
            {{ truncateString($task->assignment->content, 75) }}
          @endif
        </td>
        @if(Auth::check())
          <td>
			<!--
            @if($task->descriptions)
              @include('assignment.edit')
            @else
              @include('assignment.create')
            @endif
			-->
          </td>
        @endif
      </tr>
    @endforeach
  </tbody>

</table>

@stop
