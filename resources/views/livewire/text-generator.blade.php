<div>
    <label for="paragraph_count">Paragraphes</label>
    <input wire:model="count" 
           type="text" 
           value="1" 
           maxlength="2"
           name="paragraph_count"
           class="border border-gray-400 p-2 mt-6">

    <div x-data="copy_button" 
         class="flex space-x-2 mt-6">
        <button 
            type="button"
            data-mdb-ripple="true"
            data-mdb-ripple-color="light"
            class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
            x-bind="copy">Copier le texte</button>

            <div x-bind="toast" 			
                 x-transition:enter="transition ease-in duration-200"
                 x-transition:enter-start="transform opacity-0 translate-y-2"
                 x-transition:enter-end="transform opacity-100"
                 x-transition:leave="transition ease-out duration-500"
                 x-transition:leave-start="transform translate-x-0 opacity-100"
                 x-transition:leave-end="transform translate-x-full opacity-0" 
                 class="p-3 bg-blue-600 rounded-xl break-words text-white fixed top-10 right-10">Texte copié, mille sabords!</div>
    </div>



    <div class="mt-6" id="paragraphs">
        @foreach($paragraphs as $paragraph)
            <p class="mt-6 text-justify">{{ $paragraph }}</p>
        @endforeach
    </div>
</div>



