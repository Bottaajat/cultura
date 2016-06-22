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
      <img class="thumbnail img-responsive" src="{!! $user->src !!}" width="300px">
    @else
      <img class="thumbnail img-responsive" src="/img/defaultuser.png" width="300px">
    @endif
  </div>
  <div class="col-xs-7 col-md-6">
    <p class='h3'>
      Yhteystiedot:
    </p>
    <p class='h3'>
      Sähköposti:
      {!! $user->email !!}
    </p>
    <p class="h3">
      Puhelinnumero:
      {!! $user->phone !!}
    </p>
    <p class="h4">
      {!! nl2br(e($user->intro)) !!}
    </p>
  </div>
</div>

@stop
