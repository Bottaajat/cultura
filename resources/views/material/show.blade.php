{{-- Materiaalinäkymä --}}
<div class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <div id="menu-1-toggle" data-toggle="collapse" href="#collapseMat">
          Materiaali <i id=panelarrow class="glyphicon glyphicon-triangle-bottom pull-right"></i>
      </div>
      </h4>
    </div>
    <div id="collapseMat" class="panel-collapse collapse in">
      <div class="panel-body">

        @foreach( $exercise->descriptions as $description )
          <p class="list-group-item-text">{!! $description->content !!}</p><br>
        @endforeach

        @foreach( $exercise->materials as $material )

          @if($material->type == "sound")
          <button id="soundbtn" class="btn btn-primary" onClick="playAudio('{!! $material->src !!}',this)">
            {!! $material->label !!} <br>
            {!! $material->contents !!}
          </button>
          @endif

          @if($material->type == "image")
          <div class="col-sm-2">
            <div class="thumbnail">
         	    <img src="{!! $material->src !!}" height="64" width="64">
         	    <p>{!! $material->label !!}</p>
         	    <p>{!! $material->contents !!}</p>
            </div>
      	  </div>
          @endif

          @if( $material->type == "text" )
            <table class="table table-bordered ">
            <tr><th>{{$material->label}}</th></tr>
            @foreach(stringToArray($material->contents) as $line)
              <tr class="info"><td>{{ $line }}</td></tr>
            @endforeach
            </table>
          @endif

          @if($material->glossary)
            <table class="table table-striped table-bordered table-hover">
            <tr>
              <th>Venäjäksi</th>
              <th>Suomeksi</th>
            </tr>
            @foreach($material->glossary->get('rus','fin') as $rus => $fin)
            <tr>
                <td>{{ $rus }}</td>
                <td>{{ $fin }}</td>
            </tr>
            @endforeach
          @endif
          </table>
        @endforeach
      </div>
    </div>
  </div>
</div>
