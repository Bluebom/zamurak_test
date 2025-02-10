@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-p-purple-500 rounded-full focus:border-p-purple-600 focus:ring-p-purple-600 shadow-sm text-sm']) }}>
