@extends('layouts.master')

@section('content')

<div class="page-header">
  <h1>{!! $school->name !!}</h1>
</div>


@if(Auth::user() && !Auth::user()->is_admin)
 <div id="applybuttondiv">
   @include('school.apply')
 </div>
 @endif

 @if(Auth::user() && Auth::user()->is_admin)
 <div id="createbuttondiv">
  @include('school.edit')
 </div>
 @endif



<div class="row">
 <div class="col-xs-3 col-md-3">
    @if($school->logo)
      <img class="thumbnail" src="{!! $school->logo !!}">
    @else
      <img class="thumbnail" src="/img/defaultuser.png" height="180px" width="180px">
    @endif
  </div>

  <div class="col-xs-3 col-md-3">
    <h3>Jäsenet</h3>
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Etunimi</th>
          <th>Sukunimi</th>
        </tr>
      </thead>
      <tbody data-link="row" class="rowlink">
        @foreach($school->users as $key => $user)
          <tr>
            <td><a href="{!! action('UserController@show', ['id' => $user->id]) !!}">{!! $key+1 !!}</a></td>
            <td>{!! $user->firstname !!}</td>
            <td>{!! $user->lastname !!}</td>
          </tr>
          @endforeach
      </tbody>
    </table>
  </div>

  <div class="col-xs-3 col-md-3">
    <h3>Hakijat</h3>
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Etunimi</th>
          <th>Sukunimi</th>
        </tr>
      </thead>
      <tbody data-link="row" class="rowlink">
        @foreach($school->users as $key => $user)
          <tr>
            <td><a href="{!! action('UserController@show', ['id' => $user->id]) !!}">{!! $key+1 !!}</a></td>
            <td>{!! $user->firstname !!}</td>
            <td>{!! $user->lastname !!}</td>
          </tr>
          @endforeach
      </tbody>
    </table>
  </div>

</div>

@stop
