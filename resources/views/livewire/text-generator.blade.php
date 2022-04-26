<div>
    <label for="paragraph_count">Paragraphes</label>
    <input wire:model="count" 
           type="text" 
           value="1" 
           maxlength="2"
           name="paragraph_count"
           class="border border-gray-400 p-2 mt-6">
    <div class="mt-6" id="paragraphs">
        @foreach($paragraphs as $paragraph)
            <p class="mt-6 text-justify">{{ $paragraph }}</p>
        @endforeach
    </div>

    <div x-data>
        <button @click="$clipboard()">Copier le texte</button>
    </div>
</div>



