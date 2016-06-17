@if ($paginator->lastPage() > 1)

  <ul class="pagination">
      <li class="{!! ($paginator->currentPage() == 1) ? ' disabled' : '' !!}">
          <a href="{!! $paginator->previousPageUrl() !!}">
            Edellinen
          </a>
      </li>
      
      @for ($i = 1; $i <= $paginator->lastPage(); $i++)
          <li class="{!! ($paginator->currentPage() == $i) ? ' active' : '' !!}">
              <a href="{!! $paginator->url($i) !!}">{!! $i !!}</a>
          </li>
      @endfor
      
      <li class="{!! $paginator->hasMorePages()  ? '' : ' disabled' !!}">
          <a href="{!! $paginator->nextPageUrl() !!}">
            Seuraava
          </a>
      </li>
  </ul>

@endif