<!DOCTYPE html>
<html>
<head>
	<title> Cultura </title>
	<meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
	<link rel="stylesheet" href="/bootstrap-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="/bootstrap-dist/css/bootstrap-theme.min.css">
	<script src="/bootstrap-dist/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
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