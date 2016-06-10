@extends('layouts.master')

@section('content')
<div class="page-header">
  <h1>Käyttäjän {!! $user->name() !!}</h1>
</div>


@stop