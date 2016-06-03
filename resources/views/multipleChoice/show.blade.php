
@foreach($task->multiplechoises as $mc)
  {!! $mc->id . ". " . $mc->question !!}<br><br>
  <b>{!! "Vaihtoehdot:" !!}</b><br>
  {!! nl2br(e($mc->choices)) !!}<br><br>
  {!! "<b>Ratkaisu: </b>" . $mc->solution !!}<br><br>
@endforeach
