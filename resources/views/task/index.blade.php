@extends('layouts.master')

@section('content')
<div class="page-header">
  <h1>Tehtävät </h1>
</div>

<div class="createbuttondiv">
  <div class="row">
  <div class="col-xs-6 .col-sm-4 pull-right">
    @if(belongsToSchool(Auth::user()))
      @if(count($exercise_list) > 0)
        @include('task.create')
      @else
        <strong class="pull-right">Koululla ei ole harjoituksia</strong>
      @endif
    @endif
   </div>

  <div class="col-xs-6 .col-sm-4">
    {!! Form::open(array('action'=>array('TaskController@index'), 'method'=>'get')) !!}
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
      <th>Tyyppi</th>
      <th>Tehtävänanto</th>
      @if(belongsToSchool(Auth::user()))
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

        @if(belongsToSchool(Auth::user()))
          <td class="rowlink-skip center-align">
            @if (checkMembership(Auth::user(), $task->exercise->school))
              @include('task.edit')
            @else
            <button type="button" class="btn btn-primary disabled">
              <span class="glyphicon glyphicon-pencil"></span>
                Muokkaa
              </button>
            @endif
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

<div class="paginationdiv">
  @include('pagination.default', ['paginator' => $tasks])
</div>

@stop
