@section('pagehead')
	{{Html::script('/js/jquery-ui.min.js')}}
	{{Html::script('/js/keyboard.js')}}
	{{Html::script('/js/russian.js')}}
	{{Html::script('/js/filling.virtual-keyboard.js')}}
	{{Html::script('/js/filling.task.js')}}
	
	{{Html::style('/css/filling.show.css')}}
	{{Html::style('/css/keyboard.css')}}
	
@stop

<div id="text">

</div>
<div id="buttons_container" class="panel-body">
	<button id="clear" class="btn btn-warning" onclick=clear_all()>Tyhjennä</button>
	<button id="check" class="btn btn-success" onclick=check()>Tarkista</button>
</div>

<?php

	//echo $text;
	echo '<script>fill("'.$text.'")</script>';
	//echo '<script>test()</script>';
	
?>
