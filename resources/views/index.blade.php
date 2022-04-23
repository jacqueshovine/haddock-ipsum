<x-layout>
    <main>
        <section class="py-8 max-w-4xl mx-auto">
            <h1 class="text-3xl font-bold">Générateur de texte</h1>
            <p class="mt-6">
                @foreach ($words as $word)
                    {{ $word->content . '!...' . ' '}}
                @endforeach
            </p>
        </section>
    </main>
</x-layout>