<!doctype html>

<head>
    <x-analytics.gtag></x-analytics.gtag>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Haddock Ipsum</title>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="/css/alpine.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico">
    <script src="/js/alpine.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    @livewireStyles
</head>

<style>
    html {
        scroll-behavior: smooth;
    }
</style>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PVMZSQT"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
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
