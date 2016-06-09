@extends('layouts.master')

@section('content')
<div class="page-header">
  <h1>Käyttäjät</h1>
</div>

@if(Auth::user()->is_admin)
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
      @if(Auth::user()->is_admin)
      <th>Salasana</th>
      @endif
      <th>Koulu</th>
      <th>Editoi</th>
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
        @if(Auth::user()->is_admin)
        <td>{!! $user->password !!}</td>
        @endif
        <td>{!! $user->school->name !!}</td>
        <td>@include('user.edit')</td>
      </tr>
    @endforeach
  </tbody>

</table>

@stop
