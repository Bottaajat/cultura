@extends('layouts.master')

@section('content')
<div class="page-header">
  <h1>Tehtävät </h1>
</div>

@if(Auth::check())
  <div class="createbuttondiv">
    @include('task.create')
  </div>
@endif
<div class="table-responsive">
<table class="table table-bordered table-hover">

  <thead>
    <tr>
      <th>#</th>
      <th>Nimi</th>
      <th>Tyyppi</th>
      <th>Tehtävänanto</th>
      @if(Auth::check())
        <th>Muokkaa</th>
        <th>Sanasto</th>
      @endif
    </tr>
  </thead>

  <tbody data-link="row" class="rowlink">
    @foreach($tasks as $task)
      <tr>

        <td>{!! $task->id !!}</td>
        <td>
          <a href="{!!route('task.show', ['task_id' => $task->id]) !!}">
            {!! $task->name !!}
          </a>
        </td>
        <td>{!! $task->type !!}</td>
        <td>
          @if($task->assignment)
            {!! truncateString($task->assignment, 75) !!}
          @endif
        </td>

        @if(Auth::check())
          <td class="rowlink-skip center-align">
            @include('task.edit')
          </td>
          <td class="rowlink-skip center-align">
            @if ($task->glossary)
              @include('taskglossary.edit')
            @else
              @include('taskglossary.create')
            @endif
          </td>
        @endif

      </tr>
    @endforeach
  </tbody>

</table>
</div>
@stop
