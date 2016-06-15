<!DOCTYPE html>
<html>
<head>
	<title> Cultura </title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- styles -->
	{!! Html::style("/css/bootstrap.min.css") !!}
	{!! Html::style("/css/bootstrap-theme.min.css") !!}
  {!! Html::style("/css/main.css") !!}
	{!! Html::style("/css/jasny-bootstrap.min.css") !!}

	<!-- Font -->
	<link rel="stylesheet" href="/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300,100|Lobster|Ubuntu&subset=latin,cyrillic' rel='stylesheet' type='text/css'>

	<!-- Favicon -->
	<link rel="shortcut icon" href="/img/favicon.ico">


	<!-- Javascript -->
	{!! Html::script("/js/jquery.min.js") !!}
	{!! Html::script("/js/bootstrap.min.js") !!}
	{!! Html::script("/js/jasny-bootstrap.min.js") !!}


	@yield('pagehead')

</head>

<body id="master-layout">

@include('layouts.navigation')

<div id="wrap">

<div class="container">
@if(isset($errors) and !($errors->first()==NULL))
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



<div class='container'>
	@yield('content')
</div>

<div class="push"></div>
</div>
</div>
@include('layouts.footer')


</body>
</html>
