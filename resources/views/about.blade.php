<x-layout>
    <main>
        <x-about-section>
            <div class="flex-1 m-4 text-justify">
                <h2>A quoi sert Haddock ipsum ?</h2>
                <p>
                    Le lorem ipsum (lipsum) est le nom donné au texte générique utilisé à l'origine en imprimerie
                    pour tester une mise en page en attendant le contenu final. 
                    Le texte de remplissage n'a pas de sens, son but est avant tout visuel :
                    les paragraphes doivent donner l'impression d'authentiques colonnes de journal.
                    Aujourd'hui, on utilise également le lorem pour remplir des maquettes, des sites web en développement, etc.
                </p>
                <p class="my-4">
                Haddock ipsum est un générateur de faux-texte personnalisé créé sur le modèle du 
                    <x-about-link href="https://fr.wikipedia.org/wiki/Lorem_ipsum">
                        lorem ipsum
                    </x-about-link>
                </p>
                <p class="my-4">
                Il conviendra à merveille aux amateurs de langage fleuri et à tous les tintinophiles.
                A utiliser sans modération, au risque d'y perdre son (faux) latin.
                </p>
            </div>
            <div class="flex-initial w-64 m-4">
                <x-about-image src="haddock_instruit.jpg"></x-about-image>
            </div>
        </x-about-section>

        <x-about-section>
            <div class="flex-1 m-4 text-justify">
                <h2>Pourquoi Haddock ipsum ?</h2>
                <p>L'idée m'est venue alors que je mangeais un sandwich emballé dans du papier imprimé en
                    <x-about-link href="https://baconipsum.com/">
                        Bacon ipsum.
                    </x-about-link>
                   Les plus observateurs noteront que je me suis grandement inspiré de ce site pour créer le mien.
                </p>
                <p class="my-4">Tintinophile depuis mon plus jeune âge et développeur web de formation, 
                    j'ai saisi l'occasion de créer un outil utile et amusant tout en exerçant mes compétences.
                </p>
            </div>
            <div class="flex-initial w-64 m-4">
                <x-about-image src="papier_sandwich.jpg">
                    Le papier de mon délicieux sandwich
                </x-about-image>
            </div>
        </x-about-section>

        <x-about-section>
            <div class="flex-1 m-4 text-justify">
                <h2>Comment l'outil a t-il été créé ?</h2>
                <h3>Développement</h3>
                <p class="my-4">
                    J'ai utilisé le framework PHP
                    <x-about-link href="https://laravel.com/">
                        Laravel
                    </x-about-link>
                    pour développer Haddock ipsum. Le code peut être consulté sur 
                    <x-about-link href="https://github.com/jacqueshovine/haddock-ipsum">
                        Github.
                    </x-about-link>
                    Le choix d'utiliser Laravel n'est probablement pas le plus adapté, 
                    il s'agit d'une préférence personelle en raison de mon intérêt pour le framework.
                </p>
                <h3>Contenu</h3>
                <p class="my-4">
                    Je me suis souvenu avoir en ma possession <i>L'intégrale des jurons du Capitaine Haddock</i>
                    (2004) d'Albert Algoud. Plus pratique que de parcourir tous les albums! Il a quand même fallu remplir la base de données à la main.
                </p>
            </div>
            <div class="flex-initial w-64 m-4">
                <x-about-image src="papier_sandwich.jpg">
                    Fier membre de Neurchi de Tintin depuis 2019
                </x-about-image>
            </div>
        </x-about-section>

        <x-about-section>
            <div class="flex-1 m-4 text-justify">
                <h2>Tous les jurons du capitaine sont ils présents dans le générateur ?</h2>
                <p>
                    Non! J'ai décidé d'en retirer certains de façon tout à fait arbitraire.
                </p>
                <p class="my-4">
                    C'est notamment le cas pour les insultes ne s'adressant qu'à un seul personnage dans des conditions spécifiques
                    (Par exemple, "Calamité" employé pour qualifier la pauvre Castafiore, ou "Chenapan" pour fustiger Abdallah).
                </p>
                <p class="my-4">
                    Certains mots de <i>L'intégrale des jurons du Capitaine Haddock</i> figurent séparés de leur contexte et n'ont pas vraiment de sens
                    en dehors. Je les ai retirés pour le moment.
                </p>
                <p class="my-4">
                    Il existe aussi dans le livre des mots issus d'anciennes versions des albums, ou ne figurant que dans le journal Tintin. J'ai décidé de ne pas
                    les inclure dans le générateur pour l'instant.
                </p>
                <p class="my-4">
                    Certains jurons ne s'emploient qu'au singulier, d'autres seulement au pluriel. Il se peut que j'aie fait des erreurs et accordé en nombre
                    des insultes n'apparaissant qu'au singulier dans les albums, et vice-versa.
                </p>
            </div>
        </x-about-section>
    </main>
</x-layout>
