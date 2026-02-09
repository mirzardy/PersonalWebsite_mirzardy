<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <script>
        document.addEventListener('submit', function () {
            localStorage.setItem('scrollY', window.scrollY);
        });

        window.addEventListener('load', function () {
            const scrollY = localStorage.getItem('scrollY');
            if (scrollY !== null) {
                window.scrollTo(0, scrollY);
                localStorage.removeItem('scrollY');
            }
        });
    </script>

    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-50 flex flex-col">

            @include('layouts.navigation')
            <div class="h-16"></div>

            @isset($header)
                <header class="bg-white shadow z-10 relative">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <main class="flex-grow">
                @yield('content')
            </main>

            @include('layouts.footer')

        </div>
    </body>
</html>
