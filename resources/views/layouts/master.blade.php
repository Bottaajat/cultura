<!DOCTYPE html>
<html>
<head>
	<title> Cultura </title>
	<meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/bootstrap-theme.min.css">
	<script src="/js/jquery.min.js" type="text/javascript"></script>
	<script src="/js/bootstrap.min.js" type="text/javascript"></script>
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