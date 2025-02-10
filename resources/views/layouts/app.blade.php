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

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-poppins antialiased">
    <div class="min-h-screen bg-gray-100">
        {{-- <livewire:layout.navigation /> --}}

        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="mx-auto w-full bg-p-purple-200 px-10 py-6 flex justify-between items-center">
                <h1 class="text-3xl font-bold text-p-black-300">Portal</h1>
                <livewire:dashboard.logout-action />
            </div>
        </header>

        <!-- Page Content -->
        <main class="p-8">
            {{ $slot }}
        </main>
    </div>
</body>

</html>
