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

    <!-- Alpine Plugins -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/mask@3.x.x/dist/cdn.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased">
<div class="min-h-screen flex flex-col sm:justify-center items-center">
    <div class="w-full sm:max-w-6xl mt-6 px-2 sm:px-6 py-4 overflow-hidden sm:rounded-2xl">

        <div class="sm:flex items-center justify-between px-4 mb-2">
            <div>
                <div class="font-medium text-zinc-800 dark:text-white text-2xl">Pgvector Scout Demo Application</div>
                <a class="text-sm text-zinc-500 dark:text-white/70" href="https://github.com/benbjurstrom/pgvector-scout-demo">
                    github.com/benbjurstrom/pgvector-scout-demo
                </a>
            </div>
            <div></div>
        </div>

        <div class="overflow-x-auto px-4">
            <div class="m-auto max-w-full flex justify-center">
                <div class="w-full">
                    <div class="border-0 bg-zinc-800/15 dark:bg-white/20 h-px w-full"></div>
                </div>
            </div>
        </div>

        {{ $slot }}
    </div>
</div>
</body>
</html>
