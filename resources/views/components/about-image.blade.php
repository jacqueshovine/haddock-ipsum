@props([
    'class' => 'min-h-300 mt-4',
    'src' => 'haddock_1.jpg',
])

<img src="{{ "images/about/" . $src }}" class="{{ $class }}">
<figcaption>{{ $slot }}</figcaption>