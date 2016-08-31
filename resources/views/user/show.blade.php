@extends('layouts.master')

@section('content')
<div class="page-header">
  <h1>{!! $user->name() !!}</h1>
</div>

<div class="createbuttondiv">
@if(Auth::check() && (Auth::user()->is_admin || Auth::user()->id == $user->id))
  @include('user.pic')
  @include('user.edit')
@endif
@if (checkMembership(Auth::user(), $school) && $user->pending != NULL)
  @include('school.accept')
@endif
</div>

<div class="row">
  <div class="col-xs-12 col-md-offset-3 col-md-3">
    @if($user->src)
      <img class="thumbnail img-responsive" src="{!! $user->src !!}" width="300px">
    @else
      <img class="thumbnail img-responsive" src="/img/defaultuser.png" width="300px">
    @endif
  </div>
  <div class="col-xs-12 col-md-4 ">
    <p class='h3'>
      Yhteystiedot:
    </p>
    <p class='h3'>
      Sähköposti: <br>
      {!! $user->email !!}
    </p>
    @if($user->phone)
    <p class="h3">
      Puhelinnumero: <br>
      {!! $user->phone !!}
    </p>
    @endif
    <p class="h3">
    @if($user->school)
      {!! 'Olet koulun ' . $user->school->name . ' jäsen.' !!}
    @elseif (Auth::check() && Auth::user()->id === $user->id)
      {!! 'Et ole vielä minkään koulun jäsen!' !!}
    @else
      {!! 'Käyttäjä ei kuulu mihikään kouluun' !!}
    @endif
    </p>
    <p class="h4">
      {!! nl2br(e($user->intro)) !!}
    </p>
  </div>
</div>

@stop
