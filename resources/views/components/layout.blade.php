<!doctype html>

<head>
    <meta charset="utf-8" />
    <title>Haddock Ipsum</title>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="/css/alpine.css" rel="stylesheet">
    <script src="/js/alpine.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <x-analytics.gtag></x-analytics.gtag>

    @livewireStyles
</head>

<style>
    html {
        scroll-behavior: smooth;
    }
</style>

<body>
    <header class="max-w-4xl mx-auto md:flex md:justify-center md:items-center">
        <img src="images/banner_haddock_ipsum.jpg" class="object-fill">
    </header>
    <nav class="pb-4 max-w-4xl mx-auto">
        <div class="p-4 md:flex md:justify-center md:items-center bg-blue-200 border-t-2 border-double border-orange-500">
            <x-navlink>Haddock ipsum</x-navlink>
            <x-navlink href="/about">A propos</x-navlink>
            <x-navlink href="https://github.com/jacqueshovine/haddock-ipsum">Github</x-navlink>
        </div>
    </nav>

    {{ $slot }}

    @livewireScripts
</body>
