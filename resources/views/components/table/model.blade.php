<div class="w-full" x-data="{ open: false, toggle() { this.open = !this.open } }">
    {{ $outsideCard }}
    <div x-show="open" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-15">
        {{ $insideCard }}
    </div>
</div>
