@section('pagehead')
	{{Html::style('/css/ordering.css')}}
	{{Html::script('/js/jquery-ui.min.js')}}
	{{Html::script('/js/touch.js')}}
	@if ($task->type == 'Sanojen yhdistäminen')
       {{Html::script('/js/order.text.task.js')}}
    @else
	   {{Html::script('/js/order.image.task.js')}}
	@endif
@stop

<?php
	$draggables = '["'.str_replace(',', '","', implode(',', $draggables)).'"]';
	$droppables = '["'.str_replace(',', '","', implode(',', $droppables)).'"]';
	$showables = '["'.str_replace(',', '","', implode(',', $showables)).'"]';
	if ($task['type']=='Sanojen yhdistäminen') {
		echo '<script>init('.$draggables.','.$droppables.','.$showables.')</script>';
	}	
	if ($task['type']=='Kuvien yhdistäminen') {
		//echo'<script src="/js/order.image.task.js"></script>';
		echo '<script>init('.$draggables.','.$droppables.')</script>';
	}
?>

<div id="droppablearea" class="panel-body"> </div>
<div id="draggablearea" class="panel-body"> </div>
