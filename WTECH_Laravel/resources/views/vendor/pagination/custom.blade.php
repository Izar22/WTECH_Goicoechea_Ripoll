@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Página Anterior --}}
        @if ($paginator->onFirstPage())
            <span class="page_button">Previous</span>
        @else
            <a href="{{ $paginator->previousPageUrl() . '&' . http_build_query(request()->except('page')) }}" class="page_button">Previous</a>
        @endif

        {{-- Lógica para mostrar las páginas numeradas --}}
        @php
            $currentPage = $paginator->currentPage();
            $lastPage = $paginator->lastPage();
            $pagesToShow = 10; // Cuántas páginas mostrar (máximo)
            $startPage = max(1, $currentPage - floor($pagesToShow / 2));
            $endPage = min($lastPage, $startPage + $pagesToShow - 1);
        @endphp

        {{-- Páginas numeradas --}}
        @for ($page = $startPage; $page <= $endPage; $page++)
            <a href="{{ $paginator->url($page) . '&' . http_build_query(request()->except('page')) }}" class="page_button {{ $page == $currentPage ? 'active' : '' }}">{{ $page }}</a>
        @endfor

        {{-- Mostrar puntos suspensivos si hay más páginas fuera del rango --}}
        @if ($startPage >= 1 && $currentPage != $lastPage && $endPage > $pagesToShow)
            <span class="page_button">...</span>
        @endif

        {{-- Última página --}}
        @if ($endPage < $lastPage)
            <a href="{{ $paginator->url($lastPage) . '&' . http_build_query(request()->except('page')) }}" class="page_button">{{ $lastPage }}</a>
        @endif

        {{-- Página Siguiente --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() . '&' . http_build_query(request()->except('page')) }}" class="page_button">Next</a>
        @else
            <span class="page_button">Next</span>
        @endif
    </ul>
@endif
