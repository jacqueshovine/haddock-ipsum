@props([
    'class' => 'h-96',
    'src' => 'haddock_1.jpg',
    'alt' => '',
])

<body>
    <main class="max-w-4xl mx-auto flex 
    flex-col">
        <div class="my-4 mx-auto"></div>
            <a href="/" class="text-center text-blue-600">Retour à Moulinsart</a>
        </div>
        <div class="my-4 mx-auto">
            <img src="{{ "images/" . $src }}" class="{{ $class }}" alt="{{ $alt }}">
        </div>
    </main>
</body>