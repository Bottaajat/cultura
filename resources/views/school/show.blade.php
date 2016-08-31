@extends('layouts.master')

@section('content')

<div class="page-header">
  <h1>{!! $school->name !!}</h1>
</div>


@if(Auth::user() && !Auth::user()->is_admin && Auth::user()->pending == NULL && Auth::user()->school == NULL)
 <div class="applybuttondiv">
   @include('school.apply')
 </div>
 @elseif(Auth::user() && Auth::user()->pending == $school->id)
 <div class="cancelbuttondiv">
   @include('school.cancel')
 </div>
 @else
 @endif

 @if(Auth::user() && Auth::user()->is_admin)
 <div class="createbuttondiv">
  @include('school.edit')
  @include('school.logo')
 </div>
 @endif



<div class="row">
 <div class="col-xs-3 col-md-3">
    @if($school->src)
      <img class="thumbnail" src="{!! $school->src !!}" height="180px" width="180px">
    @else
      <img class="thumbnail" src="/img/defaultuser.png" height="180px" width="180px">
    @endif
  </div>

  <div class="col-xs-3 col-md-3">
  @if($school->users->isEmpty())
    <h3>Koululla ei ole vielä jäseniä!</h3>
  @else
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
  @endif
  </div>

@if(Auth::check() && checkMembership(Auth::user(), $school))
  @if($pending->isEmpty())
  <div class="col-xs-3 col-md-3">
    <h3>Ei uusia jäsenyyspyyntöjä</h3>
  </div>
  @else
  <div class="col-xs-3 col-md-3">
    <h3>Hakijat</h3>
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Etunimi</th>
          <th>Sukunimi</th>
          @if(Auth::check() && checkMembership(Auth::user(), $school))
            <th>Hyväksy/Hylkää</th>
          @endif
        </tr>
      </thead>
      <tbody data-link="row" class="rowlink">
        @foreach($pending as $key => $item)
          <tr>
            <td><a href="{!! action('UserController@show', ['id' => $item->id]) !!}">{!! $key+1 !!}</a></td>
            <td>{!! $item->firstname !!}</td>
            <td>{!! $item->lastname !!}</td>
            @if(checkMembership(Auth::user(), $school))
              <td class="rowlink-skip center-align">@include('school.accept')</td>
            @endif
          </tr>
          @endforeach
      </tbody>
    </table>
  </div>
  @endif
@endif
</div>


@stop
