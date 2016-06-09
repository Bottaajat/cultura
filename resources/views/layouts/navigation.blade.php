<nav class="nav navbar-default  nav-static-top">
	<div class="container">

		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
        <span class="icon-bar"></span>
			</button>

			<a class="navbar-brand" href="{{ url('/') }}">
      	Cultura
      </a>
		</div>

		<div class="collapse navbar-collapse" id="app-navbar-collapse">
			<ul class="nav navbar-nav navbar-right">

        <li class="dropdown dropdown-submenu">
        	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-btn fa-cog"></i> Menu</a>
					<ul class="dropdown-menu">
						<li> <a href="{{ URL::to('/user/') }}"><i class="fa fa-btn fa-users"></i> Käyttäjien listaus</a> </li>
						<li> <a href="{{ url('/exercise/') }}"><i class="fa fa-btn fa-book"></i> Harjoitusten listaus</a> </li>
						@if(Auth::check())
						<li role="separator" class="divider"></li>
						<li> <a href="{{ url('school/')}}"><i class="fa fa-btn fa-building"></i> Koulut</a> </li>
						<li> <a href="{{ url('/material/') }}"><i class="fa fa-btn fa-file"></i> Materiaalin listaus</a> </li>
						<li role="separator" class="divider"></li>
						<li> <a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Kirjaudu ulos</a> </li>
						@endif
					</ul>
        </li>

				@if(Auth::guest())
					<li class="pull-right"><a href="{{ url('/login') }}"><i class="fa fa-btn fa-sign-in"></i> Kirjaudu sisään</a></li>
				@endif
			</ul>
		</div>

	</div>
</nav>
