<div id="footer">
  <div class="container">
    @if(isset($userlist))

    <div class="row">

      @foreach($userlist as $user)
      <div class="col-xs-3">
      <b class="muted credit">{{$user->school->name}}</b>
      <p class="muted credit">{{$user->firstname . " " . $user->lastname}}</p>
      <p class="muted credit">{{$user->phone}}</p>
      <p class="muted credit">{{$user->email}}</p>
      </div>
      @endforeach

    </div>
    {{--<table class="table">
      <tbody>
        @foreach($userlist as $user)
        <td>
          <b class="muted credit">{{$user->school->name}}</b>
          <p class="muted credit">{{$user->firstname . " " . $user->lastname}}</p>
          <p class="muted credit">{{$user->phone}}</p>
          <p class="muted credit">{{$user->email}}</p>
        </td>
        @endforeach
      </tbody>
    </table> --}}
    @endif

   <div class="shameless-self-promotion">
    Sivuston suunnitteli ja kokosi <a class="bottaajat-link" href="https://github.com/Bottaajat/cultura">https://github.com/Bottaajat/cultura</a>.
  </div>
 </div>
</div>
