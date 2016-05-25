{{-- Materiaalinäkymä --}}
<div class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <div id="menu-1-toggle" data-toggle="collapse" href="#collapseMat">
          Materiaali <i class="glyphicon glyphicon-triangle-bottom"></i>
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
          <button class="btn btn-primary" onClick="playAudio('{{$material->src}}')">
            {{$material->label}} <br>
            {{$material->contents}}
            <div id="embed"></div>
          </button>
          @endif
        @endforeach
      </div>
    </div>
  </div>
</div>