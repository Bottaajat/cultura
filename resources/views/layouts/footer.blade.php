<div class="footer">
      <div class="container-fluid">
        <div class="container">
          @if(isset($userlist))
          <table class="table">
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
          </table>
          @endif


          <div class="shameless-self-promotion">
            Sivuston suunnitteli ja kokosi <a class="bottaajat-link" href="https://github.com/Bottaajat/cultura">https://github.com/Bottaajat/cultura</a>.
          </div>
        </div>
      </div>
</div>
