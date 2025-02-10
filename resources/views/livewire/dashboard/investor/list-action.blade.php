<div class="mt-6 w-full overflow-hidden rounded-xl bg-white p-2 px-8">
    <x-table.table title="Investors">
        <x-slot name="headers">
            <th class="px-3 py-3">
                <div class="flex items-center justify-between">
                    <p>Users</p>
                    <button wire:click="sortName"><x-icons.un-sort :status="$orderName" /></button>
                </div>
            </th>
            <th class="px-3 py-3">
                <div class="flex items-center justify-between">
                    <p>Status</p>
                </div>
            </th>
            <th class="px-3 py-3">
                <div class="flex items-center justify-between">
                    <p>E-mail</p>
                </div>
            </th>
            <th class="px-3 py-3">
                <div class="flex items-center justify-between">
                    <p>Date</p>
                </div>
            </th>
            <th class="py-3">
                <div class="flex items-center justify-between"></div>
            </th>
        </x-slot>
        <x-slot name="body">
            @foreach ($this->investors as $investor)
                <tr class="border-b border-gray-200 odd:bg-white even:bg-gray-50">
                    <td class="px-3 py-3">
                        <x-table.utils.text-circle-img :src="$investor->avatar" :fullname="$investor->full_name" :nickname="$investor->nickname" />
                    </td>
                    <td class="px-3 py-3">
                        <x-table.utils.status :status="$investor->status" />
                    </td>
                    <td class="px-3 py-3">
                        <div class="text-p-black-600 text-sm">
                            {{ $investor->email }}
                        </div>
                    </td>
                    <td class="px-3 py-3">
                        <div class="text-p-black-600 text-sm">
                            {{ $investor->created_at->format('d/m/y') }}
                        </div>
                    </td>
                    <td class="px-3 py-3">
                        <div class="flex items-center justify-center space-x-4">
                            <x-table.info-btn :investor="$investor" />
                            <x-table.delete-btn :investor="$investor" />
                        </div>
                    </td>
                </tr>
            @endforeach
        </x-slot>
        </x-table>
        {{ $this->investors->links() }}
</div>
