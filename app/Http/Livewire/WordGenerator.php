<?php

namespace App\Http\Livewire;

use App\Models\Word;
use Livewire\Component;

class WordGenerator extends Component
{

    public $count = 1;

    public function render()
    {

        $words = Word::all()->random()->limit($this->count)->get();

        // dd($this->count);

        if ( empty($this->count) || $this->count === 0)
        {
            $empty = new Word();
            $empty->setContent('Inutile capitaine. Il est trop loin maintenant.');

            // dd($empty);
            
            $words = collect()->add($empty);
        }

        // dd($words);

        return view('livewire.word-generator', [
            'words' => $words,
        ]);
    }
}
