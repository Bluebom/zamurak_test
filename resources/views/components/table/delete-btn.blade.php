@props(['investor'])
<x-table.model>
    <x-slot name="outsideCard">
        <button @click="toggle()" class="text-p-gray-300 hover:text-red-500"><x-icons.delete /></button>
    </x-slot>
    <x-slot name="insideCard">
        <div class="rounded-lg bg-white p-4 shadow-lg" @click.outside="toggle()">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-semibold text-gray-800">Delete Investor</h2>
            </div>
            <p class="mt-2 text-gray-600">Are you sure you want to delete this investor?</p>
            <div class="mt-4 flex justify-end">
                <button @click="toggle()" class="rounded-lg bg-gray-200 px-4 py-2 text-gray-600">Cancel</button>
                <button @click="toggle()" wire:click="delete({{ $investor->id }})"
                    class="ml-2 rounded-lg bg-red-500 px-4 py-2 text-white">Delete</button>
            </div>
        </div>
    </x-slot>
</x-table.model>
