<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite('resources/css/app.css')

    @stack('styles')
</head>

<body>
    <div class="min-h-full">
        <x-default-navigation />

        <main class="bg-gray-100 h-full">
            <div class="grid md:grid-cols-[300px_1fr] max-w-7xl mx-auto px-4 py-6 sm:px-6 lg:px-8 gap-2 md:gap-10">
                <section>
                    @yield('aside')
                </section>
                <section>
                    @yield('content')
                </section>
            </div>

        </main>
    </div>

    @stack('scripts')
    @vite('./resources/js/app.js')
</body>
