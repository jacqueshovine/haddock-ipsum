<div class="mt-6">
    <label for="word_count">Mots</label>
    <input wire:model="count" 
           type="text" 
           value="1" 
           maxlength="2"
           name="word_count"
           class="border border-gray-400 p-2 mt-6">
    <p class="mt-6">
        @foreach($words as $word)
            {{ $word->content . '!...' . ' '}}
        @endforeach
    </p>
</div>
