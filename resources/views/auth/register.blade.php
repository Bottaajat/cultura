@extends('layouts.master')

@section('content')

<div class="panel panel-default">
 <div class="panel-heading">Rekisteröidy</div>

 <div class="panel-body">
  <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
  {{ csrf_field() }}

  <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
   <div class="col-md-8 col-md-offset-2">
   <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" placeholder="Etunimi">
   @if ($errors->has('firstname'))
    <span class="help-block"><strong>{{ $errors->first('firstname') }}</strong></span>
   @endif
   </div>
  </div>

  <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
   <div class="col-md-8 col-md-offset-2">
    <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" placeholder="Sukunimi">
    @if ($errors->has('lastname'))
     <span class="help-block"><strong>{{ $errors->first('lastname') }}</strong></span>
    @endif
   </div>
  </div>

  <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
   <div class="col-md-8 col-md-offset-2">
    <input id="phone" type="phone" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Puhelinnumero">
    @if ($errors->has('phone'))
     <span class="help-block"><strong>{{ $errors->first('phone') }}</strong></span>
    @endif
    </div>
   </div>

   <!-- Separator -->
   <hr></hr>

  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
   <div class="col-md-8 col-md-offset-2">
    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Sähköpostiosoite">
    @if ($errors->has('email'))
     <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
    @endif
    </div>
   </div>

  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
   <div class="col-md-8 col-md-offset-2">
      <input id="password" type="password" class="form-control" name="password" placeholder="Salasana">

      @if ($errors->has('password'))
       <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
      @endif
    </div>
   </div>

  <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
   <div class="col-md-8 col-md-offset-2">
    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Toista salasana">
    @if ($errors->has('password_confirmation'))
     <span class="help-block"><strong>{{ $errors->first('password_confirmation') }}</strong></span>
    @endif
   </div>
  </div>

     <div class="form-group">
      <div class="col-md-6 col-md-offset-2">
        <button type="submit" class="btn btn-primary">
         <i class="fa fa-btn fa-user"></i> Rekisteröidy
        </button>
       </div>
      </div>
  </form>
 </div>
</div>

@endsection
