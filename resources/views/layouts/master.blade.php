<html>

<head>
<title> Cultura </title>
</head>

<body>

<div>
	<a href="{{ URL::to('/') }}" >{{ "Etusivu" }}</a>
	<a href="{{ URL::previous() }}">{{ "Palaa" }}</a>
</div>	

<div>
	@yield('content')
</div>

</body>

</html>