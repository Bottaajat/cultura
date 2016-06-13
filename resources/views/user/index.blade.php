@extends('layouts.master')

@section('content')
<div class="page-header">
  <h1>Käyttäjät</h1>
</div>

@if(Auth::user() && Auth::user()->is_admin)
<div id="createbuttondiv">
  @include('user.create')
</div>
@endif

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
    @foreach($users as $user)
      <tr>
        <td><a href="{!! action('UserController@show', ['id' => $user->id]) !!}">{!! $user->id !!}</a></td>
        <td>{!! $user->firstname !!}</td>
        <td>{!! $user->lastname !!}</td>
        <td>{!! $user->email !!}</td>
        <td>{!! $user->phone !!}</td>
        <td>{!! $user->school->name !!}</td>
        @if(Auth::user() && Auth::user()->is_admin)
        <td class="rowlink-skip">@include('user.edit')</td>
        @endif
      </tr>
    @endforeach
  </tbody>

</table>

@stop
