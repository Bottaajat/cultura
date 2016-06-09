@extends('layouts.master')

@section('content')
<div class="page-header">
  <h1>Käyttäjät</h1>
</div>

@if(Auth::check())
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
      @if(Auth::check())
        <th>Editoi</th>
      @endif
    </tr>
  </thead>

  <tbody>
    @foreach($users as $user)
      <tr>
        <td>{!! $user->id !!}</td>
        <td>{!! $user->firstname !!}</td>
        <td>{!! $user->lastname !!}</td>
        <td>{!! $user->email !!}</td>
        <td>{!! $user->phone !!}</td>
        <td>{!! $user->school->name !!}</td>
        @if(Auth::check())
          <td>@include('user.edit')</td>
        @endif
      </tr>
    @endforeach
  </tbody>

</table>
@stop
