@extends('layouts.master')

@section('content')
<div class="page-header">
  <h1>Käyttäjän {!! $user->name() !!} tiedot</h1>
</div>

@if(Auth::user() && (Auth::user()->is_admin || Auth::user()->id ==$user->id))
<div id="createbuttondiv">
  @include('user.edit')
</div>
@endif

<table align="center"> 
<tr>
  <td>
    <img src="/img/404.gif"> 
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


@stop