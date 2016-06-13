@extends('layouts.master')

@section('pagehead')
  <script src="/js/arrow.js" type="text/javascript"></script>
@stop

@section('content')

@if($topics->isEmpty())
  @include('errors.db')

@else
<div class="page-header">
  <h1>
    Aiheet
  </h1>
</div>

<div class="row">
  @foreach($topics as $topic)
    <div class="col-xs-6 col-md-6">
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading"  data-toggle="collapse" data-target="{!! '#collapseTopic' . $topic->id !!}">
            <h4 class="panel-title">
              <div id="{!! 'menu-' . $topic->id . '-toggle'!!}}">
                 {!! $topic->name !!}
                <i id=panelarrow class="glyphicon glyphicon-triangle-bottom pull-right"></i>
              </div>
            </h4>
          </div>
          <div id="{!! 'collapseTopic' . $topic->id !!}" class="panel-collapse collapse in">
            <div class="list-group">
              @foreach($topic->exercises as $exercise)
                <a href="" class="list-group-item"> {{ $exercise->name }} </a>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  @endforeach
</div>
@endif

@stop
