@extends('layouts.master')

@section('pagehead')
  <script src="/js/arrow.js" type="text/javascript"></script>
@stop

@section('content')


<div class="page-header">
<div class="row">
<div class="container">
  <h1> 
    <div class="pull-left"> 
      Aiheet
    </div>
    <div class="pull-right" style="margin-right:30px;margin-left:10px">
      <a href="{{ URL::to('/exercise/create') }}" class="btn btn-default">Luo uusi harjoitus</a>
    </div>
  </h1>
</div>
</div>
</div>



<div class="panel-group" id="accordion">
@foreach($topics as $topic)
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<div id="menu-{{$topic->id}}-toggle" data-toggle="collapse" data-parent="#accordion" href='{{"#collapse".$topic->id}}' >
					{{$topic->name}}
					<i class="glyphicon glyphicon-triangle-top"></i>
				</div>
			</h4>
		</div>
		<div id='{{"collapse".$topic->id}}' class="panel-collapse collapse">
			<div class="list-group">
			@foreach($topic->exercises as $exercise)
              <div class="container-fluid list-group-item">
                <div class="row">
                   <div class="pull-left">
                     <a class="list-group-item" style="margin-left:10px; href="{{URL::to($topic->name.'/'.$exercise->name)}}"> {{$exercise->name}} </a>
                   </div>
                   <div class="pull-right" style="margin-right:5px">
                    @include('exercise.destroy')
                   </div>
                </div>
          		</div>
			@endforeach
			</div>
		</div>	
	</div>
@endforeach
</div>
			
@stop