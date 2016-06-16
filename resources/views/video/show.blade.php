@extends(isset($video) ? 'layouts.master' : 'layouts.empty') 

@if (isset($video) && $video)
  @section('content')
  
  <div class="page-header">
    <h1> {{ $video->title }}</h1>
  </div>
  
  <div class="videoframe">
    <iframe 
        width="100%" 
        src="https://www.youtube.com/embed/{{ $video->emb_src }}"
        frameborder="0" allowfullscreen="true">
     </iframe>
   </div>
  @stop
  
@elseif (isset($task) && $task->video)
  
  <div class="videoframe">
  <iframe 
      width="100%" 
      src="https://www.youtube.com/embed/{{ $task->video->emb_src }}"
      frameborder="0" allowfullscreen="true">
   </iframe>
 </div>

@endif
