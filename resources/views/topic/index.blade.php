@extends('layouts.master')
@section('content')

<div class="page-header">
	<h1>{{ "Aiheet" }}</h1>
</div>

<div class="panel-group" id="accordion">
@foreach($topics as $topic)		
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<div data-toggle="collapse" data-parent="#accordion" href='{{"#collapse".$topic->id}}' >
					{{$topic->name}}
				</div>
			</h4>
		</div>
		<div id='{{"collapse".$topic->id}}' class="panel-collapse collapse">
			<div class="list-group">
			@foreach($topic->exercises as $exercise)
          <a href="{{URL::to($topic->name.'/'.$exercise->name)}}" class="list-group-item">{{$exercise->name}}</a>
			@endforeach
			</div>
		</div>	
	</div>
@endforeach
</div>
			
@stop