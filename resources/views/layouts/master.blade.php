<!DOCTYPE html>
<html>
<head>
	<title> Cultura </title>
	<meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
	{{ Html::style("/css/bootstrap.min.css") }}
	{{ Html::style("/css/bootstrap-theme.min.css") }}
	{{ Html::script("/js/jquery.min.js") }}
	{{ Html::script("/js/bootstrap.min.js") }}
	@yield('pagehead')
</head>

<body>
<div class="container">
@include('layouts.navigation')

@if(!($errors->first()==NULL))
	<div class="alert alert-danger">
		@foreach($errors->getMessages() as $error)
			<b>{{$error[0]}}</b>
		@endforeach
	</div>
@endif

@if(Session::has('success'))
	<div class="alert alert-success">
		<b>{{Session::get('success')}}</b>
	</div>
@endif

@if(Session::has('info'))
	<div class="alert alert-info">
		<p>{{Session::get('info')}}</p>
	</div>
@endif

	<div class="container-fluid">
		@yield('content')
	</div>

</div>
</body>
</html>