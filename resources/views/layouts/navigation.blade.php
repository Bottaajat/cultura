<nav class="nav navbar-inverse">
	<div class="container-fluid">

		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{ URL::to('/') }}">
				<img alt="Brand" src="/img/thumbnail.png">
			</a>
		</div>
		
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav nav-pills">
				<li><a href="{{ URL::to('/') }}" >{{ "Etusivu" }}</a></li>
				<li><a href="{{ URL::previous() }}">{{ "Palaa" }}</a></li>
			</ul>
		</div>	
	
	</div>
</nav>
