<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- @vite('resources/css/app.css') --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Chowhub</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Mulish:wght@200;400&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">

    @livewireStyles
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="antialiased" style="font-family: 'Mulish', sans-serif;
">
    <div class="min-h-screen bg-white dark:bg-gray-900">
        <div class="flex">
            {{-- <x-sidebar /> --}}

            <!-- Page Content -->
            <main class="w-full overflow-hidden">
                @include('layouts.navigation')
                <!-- Page Heading -->
                @if (isset($header))
                    <header class="bg-white shadow dark:bg-gray-800">
                        <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif

                {{ $slot }}
            </main>
        </div>

    </div>

    @livewireScripts
</body>

</html>
