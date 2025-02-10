<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-poppins">
        <div class="min-h-screen flex flex-col items-center justify-center px-4 sm:px-0 pt-0 bg-p-purple-200">
            <div class="relative w-full max-w-screen-lg mt-6 px-6 pb-8 bg-p-purple-50 rounded-xl h-full shadow-sm overflow-hidden">
                {{ $slot }}
            </div>
            <div class="flex space-x-4 *:text-p-black-100 justify-center mt-8">
                <a data-route="{{!request()->routeIs('login') ?: 'active'}}" class="hover:text-p-black-600 data-[route=active]:text-p-black-600" href="{{route('login')}}">Login page</a>
                <a data-route="{{!request()->routeIs('register') ?: 'active'}}" class="hover:text-p-black-600 data-[route=active]:text-p-black-600" href="{{route('register')}}">Register page</a>
            </div>
        </div>
    </body>
</html>
