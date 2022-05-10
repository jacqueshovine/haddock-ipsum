<div>
    <div class="flex flex-row justify-between items-center">
        <div>
            <label for="paragraph_count">Paragraphes</label>
            <input wire:model.debounce.300ms="count" 
                   type="text" 
                   value="1" 
                   maxlength="2"
                   name="paragraph_count"
                   class="border border-gray-400 p-2 mt-6">
        </div>

        <div>
            <input wire:model.debounce.300ms="withTitles" 
                   type="checkbox"
                   name="withTitles"
                   class="p-2 mt-6 h-4 w-4">
            <label for="withTitles">Titres</label>
        </div>
    
    
        <div x-data="copy_button" 
             class="flex space-x-2 mt-6">
            <button 
                type="button"
                data-mdb-ripple="true"
                data-mdb-ripple-color="light"
                class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                x-bind="copy">
                <div class="flex">
                    <span class="flex items-center mr-1">Copier le texte</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                    </svg>
                </div>
    
            </button>
    
            <div x-cloak
                    x-bind="toast" 			
                    x-transition:enter="transition ease-in duration-200"
                    x-transition:enter-start="transform opacity-0 translate-y-2"
                    x-transition:enter-end="transform opacity-100"
                    x-transition:leave="transition ease-out duration-500"
                    x-transition:leave-start="transform translate-x-0 opacity-100"
                    x-transition:leave-end="transform translate-x-full opacity-0" 
                    class="p-3 bg-blue-600 rounded-xl break-words text-white fixed bottom-10 right-10">
                    Texte copié, mille sabords!
            </div>
        </div>
    </div>




    <div class="mt-6" id="paragraphs">
        @if ( empty($paragraphs) )
            <p class="mt-6 text-justify">Haddock ipsum dolor sit amet</p>
        @else
            @for ( $i = 0; $i < $paragraphCount; $i++ )
                @unless ( empty($titles) )
                    <h2>{{ $titles[$i] }}</h2>
                @endunless
                <p class="mt-6 text-justify">{{ $paragraphs[$i] }}</p>
            @endfor
        @endif
    </div>
</div>



