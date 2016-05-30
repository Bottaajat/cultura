<nav class="nav navbar-default">
	<div class="container-fluid">

		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
			</button>
		</div>
		
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav nav-pills">
				<li><a href="{{ URL::to('/') }}" >{{ "Etusivu" }}</a></li>
				<li><a href="{{ URL::previous() }}">{{ "Palaa" }}</a></li>
        <li class="dropdown dropdown-submenu pull-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hallinta</a>
								<ul class="dropdown-menu">
                  @include('exercise.create')
								</ul>
        </li>		
			</ul>
		</div>	
	
	</div>
</nav>


