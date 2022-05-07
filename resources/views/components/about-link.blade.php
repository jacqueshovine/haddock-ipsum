@props([
    'class' => 'text-blue-600 visited:text-purple-600',
    'href' => '/',
])

<a href="{{ $href }}"
class="{{ $class }}"
target="_blank">
 {{ $slot }}
</a>