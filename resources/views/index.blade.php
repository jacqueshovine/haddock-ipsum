<x-layout>
    <main>
        <section class="max-w-4xl mx-auto">
            <div class="m-4 pb-4 border-b-2 border-solid border-orange-500">
                <p class="my-4">
                    Haddock ipsum est un générateur de faux-texte personnalisé créé sur le modèle du 
                    <a href="https://fr.wikipedia.org/wiki/Lorem_ipsum" 
                    class="text-blue-600 visited:text-purple-600"
                    target="_blank">lorem ipsum</a>.
                    Les paragraphes générés sont composés de mots tirés au hasard parmi le large éventail de jurons prononcés par le capitaine au cours de ses aventures.
                </p>
                <p class="my-4">
                    Il conviendra à merveille aux amateurs de langage fleuri et à tous les tintinophiles.
                    A utiliser sans modération, au risque d'y perdre son (faux) latin.
                </p>
            </div>

            <img src="http://localhost/api/image">

            <div class="m-4">
                @livewire('text-generator')
            </div>
        </section>
    </main>
</x-layout>
