<!doctype html>

<head>
    <meta charset="utf-8" />
    <title>Haddock Ipsum</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="/js/alpine.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @livewireStyles
</head>

<style>
    html {
        scroll-behavior: smooth;
    }
</style>

<body>
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    Home
                </a>
            </div>
        </nav>
    </section>

    {{ $slot }}

    @livewireScripts
</body>
