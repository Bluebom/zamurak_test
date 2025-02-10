@props(['investor'])
<x-table.model>
    <x-slot name="outsideCard">
        <button @click="toggle()" class="text-p-gray-300 hover:text-cyan-500"><x-icons.info /></button>
    </x-slot>
    <x-slot name="insideCard">
        <div class="rounded-lg bg-white p-4 shadow-lg" @click.outside="toggle()">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-semibold text-gray-800">Investor Information</h2>
            </div>
            <div class="mt-2 space-y-2 text-gray-600">
                <div class="flex items-center space-x-2">
                    <div class="h-9 w-9 flex-shrink-0">
                        <img class="h-9 w-9 rounded-full" src="{{ $investor->avatar }}" alt="">
                    </div>
                    <div class="flex flex-col">
                        <div class="text-p-black-600 text-sm font-medium">{{ $investor->full_name }}</div>
                        <div class="text-sm text-gray-500">{{ '@' . $investor->nickname }}</div>
                    </div>
                </div>
                <div class="text-p-black-600 text-sm">
                    <div class="text-xs text-active-600"><x-table.utils.status :status="$investor->status" /></div>
                </div>
                <div class="text-p-black-600 text-sm">
                    {{ $investor->email }}
                </div>
                <div class="text-p-black-600 text-sm">
                    {{ $investor->created_at->format('d/m/y') }}
                </div>
                <div class="text-p-black-600 max-w-[20rem] text-sm">
                    {{ $investor->bio }}
                </div>
            </div>
            <div class="mt-4 flex justify-end">
                <button @click="toggle()" class="rounded-lg bg-gray-200 px-4 py-2 text-gray-600">Close</button>
            </div>
        </div>
    </x-slot>
</x-table.model>
