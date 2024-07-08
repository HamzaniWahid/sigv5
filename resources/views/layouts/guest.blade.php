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
        <script src="./node_modules/preline/dist/preline.js"></script>
    </head>
    <body class="font-sans antialiased text-gray-900">
        <div class="flex items-center min-h-screen bg-gray-100 px-72 sm:justify-center sm:pt-0 dark:bg-gray-900">
            {{-- <div>
                <a href="/">
                    <x-application-logo class="w-auto h-auto text-gray-500 fill-current" />
                </a>
            </div> --}}

            {{-- <div class="px-6 py-4 mt-6 bg-white shadow-md sm:max-w-md dark:bg-gray-800 sm:rounded-lg"> --}}
                {{ $slot }}
            {{-- </div> --}}
        </div>
    </body>
</html>
