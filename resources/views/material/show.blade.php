{{-- Materiaalinäkymä --}}
<div class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading" data-toggle="collapse" data-target="#collapseMat">
      <h4 class="panel-title">
        <div id="menu-1-toggle">
          Materiaali
          <i id=panelarrow class="glyphicon glyphicon-triangle-bottom pull-right"></i>
      </div>
      </h4>
    </div>
    <div id="collapseMat" class="panel-collapse collapse in">
      <div class="panel-body">

        @if( $exercise->descriptions )
          <p class="list-group-item-text">{!! $exercise->descriptions->content !!}</p><br>
        @endif

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

          @if( $material->type == "video" )
          <div class="embed-responsive embed-responsive-16by9">
            <iframe src='{{$material->src}}' allowfullscreen></iframe>
          </div>
          @endif

        @endforeach
		
		@if($exercise->glossary)
            <table class="table table-striped table-bordered table-hover">
            <tr>
              <th>Venäjäksi</th>
              <th>Suomeksi</th>
            </tr>
            @foreach($exercise->glossary->get('rus','fin') as $rus => $fin)
            <tr>
                <td>{{ $rus }}</td>
                <td>{{ $fin }}</td>
            </tr>
            @endforeach
            </table>
         @endif
      </div>
    </div>
  </div>
</div>
