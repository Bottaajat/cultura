@extends('layouts.master')

@section('content')
<div class="page-header">
  <h1>{!! $user->name() !!}</h1>
</div>

@if(Auth::user() && (Auth::user()->is_admin || Auth::user()->id ==$user->id))
<div id="createbuttondiv">
  @include('user.edit')
</div>

<div id="picbuttondiv">
  @include('user.pic')
</div>
@endif

<div class="row">
  <div class="col-xs-6 col-md-6">
    @if($user->src)
      <img class="thumbnail" src="{!! $user->src !!}" height="400px" width="375px">
    @else
      <img class="thumbnail" src="/img/defaultuser.png" height="400px" width="375px">
    @endif
  </div>
  <div class="col-xs-6 col-md-6">
    <p class='h1'>
      Yhteystiedot:
    </p>
    <p class='h2'>
      Sähköposti:
      {!! $user->email !!}
    </p>
    <p class="h2">
      Puhelinnumero:
      {!! $user->phone !!}
    </p>
    <p class="h3">
      {!! nl2br(e($user->intro)) !!}
    </p>
  </div>
</div>

@stop
