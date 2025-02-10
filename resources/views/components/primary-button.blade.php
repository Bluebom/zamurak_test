<button {{ $attributes->merge([
    'type' => 'submit', 
    'class' => 'flex justify-center items-center px-4 py-2 bg-p-purple-500 border border-transparent rounded-full w-full font-normal text-sm
        text-p-purple-200 text-opacity-90 hover:text-white hover:text-opacity-100 tracking-widest hover:bg-p-purple-600 focus:bg-p-purple-600 focus:outline-none'
    ]) 
}}>
    {{ $slot }}
</button>
