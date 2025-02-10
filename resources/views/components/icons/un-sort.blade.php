@props(['status'])
<svg width="20" height="19" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M7.5 15L12.5 20L17.5 15" @if ($status == 'desc') stroke="#252525" @else stroke="#959595" @endif
        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
    <path d="M17.5 9L12.5 4L7.5 9" @if ($status == 'asc') stroke="#252525" @else stroke="#959595" @endif
        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
</svg>
