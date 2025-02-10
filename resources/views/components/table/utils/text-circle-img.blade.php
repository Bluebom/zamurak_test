@props(['src', 'fullname', 'nickname'])

<div class="flex items-center space-x-2">
    <div class="h-9 w-9 flex-shrink-0">
        <img class="h-9 w-9 rounded-full" src="{{ $src }}" alt="">
    </div>
    <div class="flex flex-col">
        <div class="text-p-black-600 text-sm font-medium">{{ $fullname }}</div>
        <div class="text-sm text-gray-500">{{ '@' . $nickname }}</div>
    </div>
</div>
