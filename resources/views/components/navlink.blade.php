@props([
    'class' => 'mx-3',
    'href' => '/',
])

<a class="{{ $class }}" href="{{ $href }}">
    {{ $slot }}
</a>
