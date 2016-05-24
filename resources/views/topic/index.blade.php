@extends('layouts.master')

@section('pagehead')
  <script src="/js/arrow.js" type="text/javascript"></script>
@stop

@section('content')


<div class="page-header">
<div class="row">
  <h1> 
    <div class="col-md-8"> 
      Aiheet
    </div>
    <div class="col-md-offset-2 col-md-1">
      <a href="{{ URL::to('/exercise/create') }}" class="btn btn-default">Luo uusi harjoitus</a>
    </div>
  </h1>
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
              <div class="container-fluid">
                <div class="row">
                   <div class="col-md-8">
                     <a class="list-group-item" href="{{URL::to($topic->name.'/'.$exercise->name)}}"> {{$exercise->name}} </a>
                   </div>
                   <div class="col-md-offset-2 col-md-1 ">
                      <a href="{{ URL::to('/exercise/delete') }}" class="btn btn-default">X</a>
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