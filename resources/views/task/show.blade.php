@extends('layouts.master')

@section('content')

<div class="page-header">
	<h1>{{ $task->name }}</h1>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title">{{$task->type}}</div>
	</div>
	<div class="panel-body">
		<form action="">
			Lorem ipsum dolor sit amet, Lorem <input type="text" name="blank1"> Ipsum adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. 
			Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, 
			ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel,
			aliquet nec, <input type="text" name="blank1"> eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam
			dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi.
			Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.
			 Aliquam lorem ante, dapibus in, <input type="text" name="blank1"> quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. 
			 Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. 
			 Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet 
			 adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec 
			 odio et ante tincidunt tempus. <input type="text" name="blank1"> vitae sapien ut libero venenatis faucibus. 
			 Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla 
			mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, 
		</form>
	</div>
</div>

<input class="btn btn-default" type="submit" value="Palauta">

@stop