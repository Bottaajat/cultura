@section('pagehead')
	{{Html::style('/css/ordering.css')}}
	{{Html::script('/js/jquery-ui.min.js')}}
	{{Html::script('/js/touch.js')}}
@stop

<?php

	if ($task['type']=='Sanojen yhdistäminen') echo'<script src="/js/order.text.task.js"></script>';
	if ($task['type']=='Kuvien yhdistäminen') echo'<script src="/js/order.image.task.js"></script>';
	echo '<script>init(["'.str_replace(',', '","', implode(',', $draggables)).'"],["'.str_replace(',', '","', implode(',', $droppables)).'"],["'.str_replace(',', '","', implode(',', $showables)).'"],["'.str_replace(',', '","', implode(',', $srcs)).'"])</script>';

?>

<div id="droppablearea" class="panel-body"> </div>
<div id="draggablearea" class="panel-body"> </div>
