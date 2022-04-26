<?php

namespace App\Http\Livewire;

use App\Models\Word;
use Livewire\Component;

class WordGenerator extends Component
{

    public $count = 10;

    public function render()
    {

        $words = Word::all();
        $max = $words->count();

        $words = $words->random($this->count > $max ? $max : $this->count);

        if ( empty($this->count) || $this->count === 0 || !is_numeric($this->count))
        {
            $empty = new Word();
            $empty->setContent('Inutile capitaine. Il est trop loin maintenant.');
            
            $words = collect()->add($empty);
        }

        return view('livewire.word-generator', [
            'words' => $words,
        ]);
    }
}
