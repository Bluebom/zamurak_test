@props(['title'])
<div>
    <header class="px-3 py-6">
        <div class="flex flex-col items-center justify-between space-y-4 sm:flex-row sm:space-y-0">
            <h2 class="text-xl font-bold text-p-black-600">{{ $title }}</h2>
            <div class="flex flex-col items-center space-x-0 space-y-2 xs:flex-row xs:space-x-2 xs:space-y-0">
                <div class="relative h-8 w-full text-gray-400">
                    <x-icons.search class="absolute left-3 top-1/2 -translate-y-1/2" width="16" height="16" />
                    <input type="text" wire:model.live.debouce.500ms="query" placeholder="Search"
                        class="placeholder-font-medium h-8 w-48 rounded-lg border-[1px] border-gray-200 px-3 pl-9 text-xs font-medium placeholder-gray-400 
                        focus:border-p-purple-600 focus:border-2 
                        focus:outline-none focus:ring-0" />
                </div>
                <x-table.filter-btn name="showTrashed" />
                <button wire:click="generateCsv" wire:target="generateCsv" wire:loading.class="opacity-50"
                    class="flex h-8 w-full items-center justify-center rounded-lg bg-p-purple-600 px-3"><x-icons.download /></button>
            </div>
        </div>
    </header>
    <main class="overflow-x-auto rounded-xl border-[1px]">
        <table class="w-full text-left text-sm rtl:text-right">
            <thead class="[&_p]:font-[600] [&_p]:text-p-black-600">
                <tr class="border-b border-gray-200">
                    {{ $headers }}
                </tr>
            </thead>
            <tbody>
                {{ $body }}
            </tbody>
        </table>
    </main>
</div>
