@if ($paginator->lastPage() > 1)

  <ul class="pagination">
      
      <li class="{!! ($paginator->currentPage() == 1) ? 'disabled' : '' !!}">
        <a href="{!! $paginator->url(1) !!}">
          <<
        </a>
      </li>
      
      <li class="{!! ($paginator->currentPage() == 1) ? ' disabled' : '' !!}">
          <a href="{!! $paginator->previousPageUrl() !!}">
            Edellinen
          </a>
      </li>
      
       <li class="active">
          <a href="">
            {!! $paginator->currentPage() !!}
          </a>
      </li>
      

      <li class="{!! $paginator->hasMorePages()  ? '' : ' disabled' !!}">
          <a href="{!! $paginator->nextPageUrl() !!}">
            Seuraava
          </a>
      </li>
      <li class="{!! ($paginator->currentPage() == $paginator->lastPage()) ? 'disabled' : '' !!}">
        <a href="{!! $paginator->url($paginator->lastPage()) !!}">
          >>
        </a>
      </li>

  </ul>

@endif