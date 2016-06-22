@extends('layouts.master')

@section('content')
<div class="page-header">
  <h1>Käyttäjät</h1>
</div>

@if($users->isEmpty())
<div class="jumbotron">
  <p class="text-danger">
    <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Järjestelmässä ei ole vielä käyttäjiä!
  </p>
</div>

@else
<table class="table table-bordered table-hover">

  <thead>
    <tr>
      <th>#</th>
      <th>Etunimi</th>
      <th>Sukunimi</th>
      <th>Sähköposti</th>
      <th>Puhelinnumero</th>
      <th>Koulu</th>
      @if(Auth::user() && Auth::user()->is_admin)
      <th>Editoi</th>
      @endif
    </tr>
  </thead>

  <tbody data-link="row" class="rowlink">
    @foreach($users as $key => $user)
      <tr>
        <td><a href="{!! action('UserController@show', ['id' => $user->id]) !!}">{!! $key+1 !!}</a></td>
        <td>{!! $user->firstname !!}</td>
        <td>{!! $user->lastname !!}</td>
        <td>{!! $user->email !!}</td>
        <td>{!! $user->phone !!}</td>
        @if($user->school == NULL)
        <td>Ei jäsenenä</td>
        @else
        <td>{!! $user->school->name !!}</td>
        @endif
        @if(Auth::user() && Auth::user()->is_admin)
        <td class="rowlink-skip">@include('user.edit')</td>
        @endif
      </tr>
    @endforeach
  </tbody>

</table>
@endif

@stop
