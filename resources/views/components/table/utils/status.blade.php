@props(['status'])

<div class="flex items-center">
    @if ($status == 'active')
        <div class="flex items-center space-x-1 rounded-full bg-active-300 px-2 py-1">
            <div class="h-2 w-2 rounded-full bg-active-600"></div>
            <div class="text-xs text-active-600">Active</div>
        </div>
    @elseif($status == 'disabled')
        <div class="flex items-center space-x-1 rounded-full bg-disabled-300 px-2 py-1">
            <div class="h-2 w-2 rounded-full bg-disabled-600"></div>
            <div class="text-xs text-disabled-600">Disabled</div>
        </div>
    @elseif($status == 'pending')
        <div class="flex items-center space-x-1 rounded-full bg-pending-300 px-2 py-1">
            <div class="h-2 w-2 rounded-full bg-pending-600"></div>
            <div class="text-xs text-pending-600">Pending</div>
        </div>
    @else
        <div class="bg-unknown-300 flex items-center space-x-1 rounded-full px-2 py-1">
            <div class="bg-unknown-600 h-2 w-2 rounded-full"></div>
            <div class="text-unknown-600 text-xs">Unknown</div>
        </div>
    @endif
</div>
