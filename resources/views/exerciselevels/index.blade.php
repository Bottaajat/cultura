@extends('layouts.master')
@section('content')

<div class="page-header">
	<h1>{{ "Aiheet" }}</h1>
</div>

<div class="list-group">
@foreach($levels as $level)
	<a href="{{URL::to($level->name)}}" class="list-group-item">{{$level->name}}</a>
@endforeach
</div>

<div class="panel-group" id="accordion">
@foreach($levels as $level)		
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href='{{"#collapse".$level->id}}' >
					{{$level->name}}
				</a>
			</h4>
		</div>
		<div id='{{"collapse".$level->id}}' class="panel-collapse collapse">
			<ul class="list-group">
			@foreach($level->exercises as $exercise)
				<li class="list-group-item"> 
          <a href="{{URL::to($level->name.'/'.$exercise->name)}}">{{$exercise->name}}</a>
        </li>
			@endforeach
			</ul>
		</div>	
	</div>
@endforeach
</div>
			
@stop