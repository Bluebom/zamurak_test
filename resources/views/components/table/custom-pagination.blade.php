<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">

            <div class="flex flex-1 justify-center p-4">
                <div>
                    <span class="rounded-circle relative z-0 inline-flex flex-wrap sm:flex-nowrap items-center justify-center">
                        {{-- Previous Page Link --}}
                        @php($mostrarPontos = false)
                        {{-- Pagination Elements --}}
                        @foreach ($elements as $element)
                            {{-- Array Of Links --}}
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    <span wire:key="paginator-{{ $paginator->getPageName() }}-page{{ $page }}">
                                        @if (
                                            $page <= 3 || // Exibir sempre as 3 primeiras páginas
                                                ($page > $paginator->currentPage() - 1 && $page <= $paginator->currentPage() + 1) ||
                                                in_array($page, [$paginator->lastPage() - 2, $paginator->lastPage() - 1, $paginator->lastPage()]))
                                            @php($mostrarPontos = false)
                                            @php($page = str_pad($page, 2, '0', STR_PAD_LEFT))
                                            @if ($page == $paginator->currentPage())
                                                <span data-page="{{ $page }}" aria-current="page">
                                                    <span
                                                        class="mx-1 rounded-md border-[1px] bg-slate-50 px-2 py-[6px] text-xs">{{ $page }}</span>
                                                </span>
                                            @else
                                                <button type="button"
                                                    wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')"
                                                    class="mx-1 rounded-md px-2 py-[6px] text-xs"
                                                    aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                                    {{ $page }}
                                                </button>
                                            @endif
                                        @elseif(!$mostrarPontos)
                                            @php($mostrarPontos = true)
                                            <span class="mx-1 text-xs">...</span>
                                        @endif
                                    </span>
                                @endforeach
                            @endif
                        @endforeach
                    </span>
                </div>
            </div>
        </nav>
    @endif
</div>
