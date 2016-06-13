@extends('layouts.master')

@section('content')
<div class="page-header">
  <h1>{!! $user->name() !!}</h1>
</div>

@if(Auth::user() && (Auth::user()->is_admin || Auth::user()->id ==$user->id))
<div id="createbuttondiv">
  @include('user.edit')
</div>
@endif

{{--<table align="center">
<tr>
  <td>
    @if(Auth::user()->image)
    @else
      <div class="thumbnail">
        <i class="fa fa-user fa-5x"></i>
      </div>
    @endif
  </td>
  <td>
    <table>
      <tr>
        <td>
           <p class='h2 text.center'> Etunimi:
          {!! $user->firstname !!} </p>
          </td>
      </tr>
      <tr>
        <td>
          <p class='h2 text.center'>
            Sukunimi:
            {!! $user->lastname !!}</p>
        </td>
      </tr>
      <tr>
        <td>
          <p class='h2 text.center'>
            Puhelinnumero:
            {!! $user->phone !!}
          </p>
        </td>
      </tr>
      <tr>
        <td>
          <p class='h2 text.center'>
            Sähköposti:
            {!! $user->email !!}
          </p>
        </td>
      </tr>
      <tr>
        <td class='h3 text.center'>
          {!! nl2br(e($user->intro)) !!}
        </td>
      </tr>
    </table>
  </td>
</tr>
</table>
--}}

<div class="row">
  <div class="col-xs-6 col-md-6">
    @if(Auth::user() && Auth::user()->image)
      <img class="thumbnail" src="{!! Auth::user()->image !!}">
    @else
      <img class="thumbnail" src="/img/defaultuser.png">
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
