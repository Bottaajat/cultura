@extends('layouts.master')

@section('content')
<div class="page-header">
  <h1>Tehtävät </h1>
</div>

@if(Auth::check())
  <div id="createbuttondiv">
    @include('task.create')
  </div>
@endif

<table class="table table-bordered">

  <thead>
    <tr>
      <th>#</th>
      <th>Nimi</th>
      <th>Tyyppi</th>
      <th>Tehtävänanto</th>
	  @if(Auth::check())
         <th>Muokkaa</th>
       @endif
    </tr>
  </thead>

  <tbody>
    @foreach($tasks as $task)
      <tr>
        <td>{!! $task->id !!}</td>
        <td><a href="{{route('task.show', ['task_id' => $task->id]) }}">{!! $task->name !!}</a></td>
        <td>{!! $task->type !!}</td>
        <td>
          @if($task->assignment)
            {{ truncateString($task->assignment->content, 75) }}
          @endif
        </td>
		@if(Auth::check())
         <!-- <td>@include('task.edit')</td> -->
        @endif
      </tr>
    @endforeach
  </tbody>

</table>

@stop
