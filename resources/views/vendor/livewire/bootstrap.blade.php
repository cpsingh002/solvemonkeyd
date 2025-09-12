@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
            @else
                <li class="page-item">
                    <button class="page-link" wire:click="previousPage" wire:loading.attr="disabled" rel="prev">&laquo;</button>
                </li>
            @endif

            {{-- Page Number Links --}}
            @php
                $total = $paginator->lastPage();
                $current = $paginator->currentPage();
                $start = max($current - 2, 1);
                $end = min($current + 2, $total);
            @endphp

            {{-- First Page --}}
            @if ($start > 1)
                <li class="page-item">
                    <button class="page-link" wire:click="gotoPage(1)">1</button>
                </li>

                @if ($start > 2)
                    <li class="page-item disabled"><span class="page-link">…</span></li>
                @endif
            @endif

            {{-- Pages Around Current --}}
            @for ($i = $start; $i <= $end; $i++)
                @if ($i == $current)
                    <li class="page-item active"><span class="page-link">{{ $i }}</span></li>
                @else
                    <li class="page-item">
                        <button class="page-link" wire:click="gotoPage({{ $i }})" wire:loading.attr="disabled">{{ $i }}</button>
                    </li>
                @endif
            @endfor

            {{-- Last Page --}}
            @if ($end < $total)
                @if ($end < $total - 1)
                    <li class="page-item disabled"><span class="page-link">…</span></li>
                @endif

                <li class="page-item">
                    <button class="page-link" wire:click="gotoPage({{ $total }})">{{ $total }}</button>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <button class="page-link" wire:click="nextPage" wire:loading.attr="disabled" rel="next">&raquo;</button>
                </li>
            @else
                <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
            @endif
        </ul>
    </nav>
@endif
