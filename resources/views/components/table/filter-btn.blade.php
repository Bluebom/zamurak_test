@props(['name'])
<x-table.model>
    <x-slot name="outsideCard">
        <button @click="open=true"
            class="h-8 rounded-lg border-2 border-p-purple-600 bg-p-purple-300 px-3 text-xs font-bold text-p-purple-600 w-full flex justify-center items-center">Filter</button>
    </x-slot>
    <x-slot name="insideCard">
        <div class="min-w-[20rem] rounded-lg bg-white p-4 shadow-lg" @click.outside="toggle()">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-semibold text-gray-800">Filter Example</h2>
            </div>
            <div class="mt-2 space-y-2 text-gray-600">
                <div class="flex items-center space-x-2 py-4">
                    <p>Show deleted rows</p>
                    <input type="checkbox" class="h-4 w-4 rounded-lg border-2 border-gray-300" @click="toggle()"
                        wire:click="toggleShowTrashed" />
                </div>
                <div class="mt-4 flex justify-end">
                    <button @click="toggle()" class="rounded-lg bg-gray-200 px-4 py-2 text-gray-600">Close</button>
                </div>
            </div>
        </div>
    </x-slot>
</x-table.model>
