@props([
    'class' => 'min-h-300 mt-4',
    'src' => 'haddock_1.jpg',
    'alt' => '',
])

<img src="{{ "images/about/" . $src }}" class="{{ $class }}" alt={{ $alt }}>
<figcaption>{{ $slot }}</figcaption>
