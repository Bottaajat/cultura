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
        @foreach( $exercise->materials as $material )
          @if($material->type == "info")
          <h4 class="list-group-item-heading">{{$material->label}}</h4>
          <p class="list-group-item-text">{{$material->contents}}</p>
          <br>
          @endif
          @if($material->type == "sound")
          <button id="soundbtn" class="btn btn-primary" onClick="playAudio('{{$material->src}}',this)">
            {{$material->label}} <br>
            {{$material->contents}}
          </button>
          @endif
          @if($material->type == "image")
          <div class="col-sm-2">
          <div class="thumbnail">
         	<img src='{{$material->src}}' height='64' width='64'>
         	<p>{{$material->label}}</p>
         	<p>{{$material->contents}}</p>
          </div>
      	  </div>
          @endif
        @endforeach
      </div>
    </div>
  </div>
</div>