<?php

namespace App\Http\Livewire;

use App\Models\Word;
use Livewire\Component;

class TextGenerator extends Component
{

    public $count = 1;
    private int $min_words = 40;
    private int $max_words = 80;
    private int $max_paragraphs = 30;

    public function render()
    {

        $words = Word::all();
        $paragraphs = ['Haddock ipsum dolor sit amet'];


        /*
            * TO DO : 
            * - Implement feature to add exclamation marks if desired
            */

        if (!empty($this->count) && $this->count !== 0 && is_numeric($this->count) )
        {
            for ($i = 0; 
            $i < min(max($this->count, 1), $this->max_paragraphs); 
            $i++)
            {
                for ($i = 0; 
                $i < ($this->count <= $this->max_paragraphs ? $this->count : $this->max_paragraphs); 
                $i++)
                {

                    /*
                     * TO DO : 
                     * - The same word should not appear twice in a row
                     * - Add punctuation
                     * - Uppercase first letter of each paragraph and after a full stop
                     */

                    $current_word_count = rand($this->min_words, $this->max_words);

                    $current_paragraph = '';

                    for ($j = 0; $j < $current_word_count; $j++)
                    {
                        $current_paragraph .= $words->random(1)->sole()->content . ' ';
                    }

                    $paragraphs[$i] = $current_paragraph;
                }
            }        
        }




        return view('livewire.text-generator', [
            'paragraphs' => $paragraphs
        ]);
    }
}
