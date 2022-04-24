<?php

namespace App\Http\Livewire;

use App\Models\Word;
use Livewire\Component;

class TextGenerator extends Component
{

    public int $count = 1;
    private int $min_words = 40;
    private int $max_words = 80;
    private int $max_paragraphs = 30;

    public function render()
    {

        $words = Word::all();
        $paragraphs = [''];

        for ($i = 0; 
             $i < ($this->count <= $this->max_paragraphs ? $this->count : $this->max_paragraphs); 
             $i++)
        {

            $current_word_count = rand($this->min_words, $this->max_words);

            $current_paragraph = '';

            for ($j = 0; $j < $current_word_count; $j++)
            {
                $current_paragraph .= $words->random(1)->sole()->content . ' ';
            }

            $paragraphs[$i] = $current_paragraph;
        }

        return view('livewire.text-generator', [
            'paragraphs' => $paragraphs
        ]);
    }
}
