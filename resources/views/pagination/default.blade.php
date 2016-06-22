@if ($paginator->lastPage() > 1)

  <ul class="pagination">
      <li class="{!! ($paginator->currentPage() == 1) ? ' disabled' : '' !!}">
          <a href="{!! $paginator->previousPageUrl() !!}">
            Edellinen
          </a>
      </li>
      
      <li class="{!! ($paginator->currentPage() == 1) ? ' active' : '' !!}">
        <a href="{!! $paginator->url(1) !!}">
          {!! ($paginator->currentPage() == 1) ? ' 1' : '<<' !!}
        </a>
      </li>
      
      @for (
          $i = ($paginator->currentPage() < 3 ? 
                  2: 
                  ($paginator->lastPage()-$paginator->currentPage() > 1 ?
                    $paginator->currentPage()-1 :
                    $paginator->lastPage() - 4));
                
          $i <= ($paginator->currentPage() < 3 ?
                  5:
                  ($paginator->lastPage()-$paginator->currentPage() > 1 ?
                    $paginator->currentPage()+2: 
                    $paginator->lastPage()-1));
          $i++)

          <li class="{!! ($paginator->currentPage() == $i) ? ' active' : '' !!}">
              <a href="{!! $paginator->url($i) !!}">{!! $i !!}</a>
          </li>
      @endfor
      
      
      <li class="{!! ($paginator->currentPage() == $paginator->lastPage()) ? ' active' : '' !!}">
        <a href="{!! $paginator->url($paginator->lastPage()) !!}">
          {{($paginator->currentPage() == $paginator->lastPage()) ? $paginator->lastPage() : '>>' }}
        </a>
      </li>


      <li class="{!! $paginator->hasMorePages()  ? '' : ' disabled' !!}">
          <a href="{!! $paginator->nextPageUrl() !!}">
            Seuraava
          </a>
      </li>
  </ul>

@endif