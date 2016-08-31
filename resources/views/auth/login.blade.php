@extends('layouts.master')

@section('content')

<div class="panel panel-default">
  <div class="panel-heading">Sisäänkirjautuminen</div>
    <div class="panel-body">
      <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <div class="col-md-8 col-md-offset-2">
              <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Sähköpostiosoite">

              @if ($errors->has('email'))
                <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
              @endif
            </div>
          </div>

          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

            <div class="col-md-8 col-md-offset-2">
              <input id="password" type="password" class="form-control" name="password" placeholder="Salasana">

              @if ($errors->has('password'))
                <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
              @endif
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-8 col-md-offset-2">
              <button type="submit" class="btn btn-primary">
                <i class="fa fa-btn fa-sign-in"></i> Kirjaudu sisään
              </button>

              <a role="button" class="btn btn-default" href="{{ url('/register') }}">
                <i class="fa fa-btn fa-user"></i> Rekisteröidy
              </a>
            </div>
          </div>
    </form>
  </div>
</div>


@endsection
