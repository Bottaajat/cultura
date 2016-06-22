@extends('layouts.master')

@section('content')

<div class="page-header">
  <h1>{{ $task->name }}</h1>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <div class="panel-title">{{$task->type}}</div>
  </div>

  @if(Auth::user() && $task->school && $task->school &&
  checkMembership(Auth::user(), $task->school->id))
  || Auth::user()->is_admin)
  <div class="createbuttondiv">
    @include('task.addvideo')
    @if($task->video)
      @include('task.delvideo')
    @endif
  </div>
  @endif
  
  @if (isset($task) && $task->video)
    <div class="embed-responsive embed-responsive-16by9">
    <iframe
        width="100%"
        src="https://www.youtube.com/embed/{{ $task->video->emb_src }}"
        frameborder="0" allowfullscreen="true">
     </iframe>
   </div>
    <br>
    <p class="large">{!! $task->video->desc !!}</p>
  @endif

  @if($task->glossary)
    <div class="panel-body" id="glossary">
      <table class="table table-striped table-bordered table-hover">
      <tr>
        <th>Venäjäksi</th>
        <th>Suomeksi</th>
      </tr>
      @foreach($task->glossary->get('rus','fin') as $rus => $fin)
      <tr>
        <td>{{ $rus }}</td>
        <td>{{ $fin }}</td>
      </tr>
      @endforeach
      </table>
    </div>
  @endif

  @if($task->assignment)
    <div class="panel-body" id="assignment">
      {!! $task->assignment !!}
    </div>
  @endif

  <div class="panel-body" id="task">
    @if($task->type == 'Sanojen yhdistäminen' || $task->type == 'Kuvien yhdistäminen')
      @include('ordering.show')
    @endif

    @if($task->type == 'Monivalinta')
      @include('multipleChoice.show')
    @endif

    @if($task->type == 'Sanaristikko')
      @include('crossword.show')
    @endif

    @if($task->type == 'Täyttö')
      @include('filling.show')
    @endif
  </div>
  <div id = "buttons" class="panel-body">
    <button class="btn btn-primary" onclick=location.reload()>Aloita alusta</button>
    <a class="btn btn-info pull-right" href="{!! action('ExerciseController@show', $task->exercise->id)!!}">Palaa harjoitukseen {{$task->exercise->name}} </a>
  </div>
</div>

<div class="btn btn-danger" id="btn" style="display: none;" data-toggle="modal" data-target="#success">Modal</div>

<div id="success" class="modal fade">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
      <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
      <h4 class="modal-title">Onneksi olkoon! Tehtävä suoritettu.</h4>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Sulje</button>
      <button class="btn btn-primary" onclick=location.reload()>Kokeile uudestaan</button>
      </div>
    </div>

  </div>
</div>

@stop
