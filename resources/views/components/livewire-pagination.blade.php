<div class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
            <span class="mr-2">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white transition-colors duration-150 bg-gray-800 border border-r-0 border-gray-800 rounded-md focus:outline-none focus:shadow-outline-purple">
                        {!! __('pagination.previous') !!}
                    </span>
                @else
                    <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple">
                        {!! __('pagination.previous') !!}
                    </button>
                @endif
            </span>

            <span>
                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <button wire:click="nextPage" wire:loading.attr="disabled" rel="next" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple">
                        {!! __('pagination.next') !!}
                    </button>
                @else
                    <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white transition-colors duration-150 bg-gray-800 border border-r-0 border-gray-800 rounded-md focus:outline-none focus:shadow-outline-purple">
                        {!! __('pagination.next') !!}
                    </span>
                @endif
            </span>
        </nav>
    @endif
</div>


{{-- <ul class="pagination">
    <li>
        <a class="pagination__link" href="">
            <i class="w-4 h-4" data-feather="chevrons-left"></i>
        </a>
    </li>
    <li>
        <a class="pagination__link" href="">
            <i class="w-4 h-4" data-feather="chevron-left"></i>
        </a>
    </li>
    <li>
        <a class="pagination__link" href="">...</a>
    </li>
    <li>
        <a class="pagination__link" href="">1</a>
    </li>
    <li>
        <a class="pagination__link pagination__link--active" href="">2</a>
    </li>
    <li>
        <a class="pagination__link" href="">3</a>
    </li>
    <li>
        <a class="pagination__link" href="">...</a>
    </li>
    <li>
        <a class="pagination__link" href="">
            <i class="w-4 h-4" data-feather="chevron-right"></i>
        </a>
    </li>
    <li>
        <a class="pagination__link" href="">
            <i class="w-4 h-4" data-feather="chevrons-right"></i>
        </a>
    </li>
</ul>
<select class="w-20 input box mt-3 sm:mt-0">
    <option>10</option>
    <option>25</option>
    <option>35</option>
    <option>50</option>
</select> --}}