@section('pagehead')
	{{Html::script('/js/jquery-ui.min.js')}}
	{{Html::script('/js/filling.task.js')}}
	{{Html::script('/js/touch.js')}}
	
	{{Html::style('/css/filling.show.css')}}
	
@stop

<div id="text" class="panel-body">

</div>
<div id="draggablearea" class="panel-body">

</div>

<?php

	//echo $text;
	echo '<script>fill("'.$text.'")</script>';
	//echo '<script>test()</script>';
	
?>
