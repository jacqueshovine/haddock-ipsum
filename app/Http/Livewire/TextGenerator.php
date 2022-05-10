<?php

namespace App\Http\Livewire;

use App\Models\Album;
use App\Models\Word;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class TextGenerator extends Component
{

    public mixed $count = 0;
    public bool $withTitles = false;
    private int $minWordsPerSentence = 3;
    private int $maxWordsPerSentence = 11;
    private int $minSentencesPerParagraph = 5;
    private int $maxSentencesPerParagraph = 10;
    private int $maxParagraphs = 30;

    public function render()
    {

        $words = Word::all();

        $count = is_numeric($this->count)
        ? (int) $this->count
        : 0;

        $titles = [];

        $paragraphCount = min($count, $this->maxParagraphs);

        $paragraphs = [];

        if ( $this->withTitles ) {
            $titles = $this->getTitles($paragraphCount);
        }

        /*
            * TO DO : 
            * - Implement feature to add exclamation marks if desired
            */

        if ( $paragraphCount > 0  ) {
            for (
                $i = 0;
                $i < min(max($paragraphCount, 1), $this->maxParagraphs);
                $i++
            ) {

                /*
                    * TO DO : 
                    * - The same word should not appear twice in a row
                    * - Add punctuation
                    * - Uppercase first letter of each paragraph and after a full stop
                    */

                $currentSentencesCount = rand($this->minSentencesPerParagraph, $this->maxSentencesPerParagraph);

                $currentParagraph = '';

                for ($j = 0; $j < $currentSentencesCount; $j++) {
                    $currentParagraph .= $this->buildSentence($words);
                }

                $paragraphs[$i] = $currentParagraph;
            }
        }

        return view('livewire.text-generator', [
            'titles' => $titles,
            'paragraphs' => $paragraphs,
            'paragraphCount' => $paragraphCount,
        ]);
    }

    public function buildSentence(Collection $words)
    {

        $currentSentenceArray = [];
        $currentSentenceWordCount = 0;
        $currentSentenceTargetWordCount = rand($this->minWordsPerSentence, $this->maxWordsPerSentence);

        while ($currentSentenceWordCount < $currentSentenceTargetWordCount) {

            if ($currentSentenceWordCount === 0) {
                array_push($currentSentenceArray, ucfirst($words->random(1)->sole()->singular));
            } else {
                array_push($currentSentenceArray, $words->random(1)->sole()->singular);
            }

            // Removing duplicate values from array, to avoid word repetition in the same sentence.
            $currentSentenceArray = array_unique($currentSentenceArray);

            $currentSentenceWordCount = count($currentSentenceArray);
        }

        $currentSentenceArray = $this->addCommas(
            $currentSentenceArray,
            $this->getCommaCount($currentSentenceWordCount)
        );

        $currentSentenceArray = $this->addSpaces($currentSentenceArray);

        // Adding a full stop to the end of each sentence
        array_push($currentSentenceArray, '. ');

        return implode($currentSentenceArray);
    }

    /**
     * Adds commas at the middle of a sentence, or at 1/3 and 2/3 of the sentence,
     * depending on sentence length.
     */
    public function addCommas(array $currentSentenceArray, int $commaCount)
    {

        $currentSentenceArrayWithCommas = $currentSentenceArray;

        if ($commaCount === 1) {
            array_splice(
                $currentSentenceArrayWithCommas,
                floor(count($currentSentenceArray) / 2),
                0,
                ', '
            );
        } elseif ($commaCount === 2) {
            $firstCommaIndex = floor(count($currentSentenceArray) / 3);
            $secondCommaIndex = floor(count($currentSentenceArray) / 3) * 2;
            array_splice(
                $currentSentenceArrayWithCommas,
                $firstCommaIndex,
                0,
                ', '
            );
            array_splice(
                $currentSentenceArrayWithCommas,
                $secondCommaIndex,
                0,
                ', '
            );
        }

        return $currentSentenceArrayWithCommas;
    }

    /**
     * Adds a blank space between each part of the sentence, except if it
     * is in front of a comma or after the last word.
     */
    public function addSpaces(array $currentSentenceArray)
    {

        $currentSentenceArrayWithSpaces = $currentSentenceArray;

        for ($i = 0; $i < count($currentSentenceArray); $i++) {

            if ($i < count($currentSentenceArray) - 1 && $currentSentenceArrayWithSpaces[$i + 1] !== ', ') {
                $currentSentenceArrayWithSpaces[$i] .= ' ';
            }
        }

        return $currentSentenceArrayWithSpaces;
    }

    public function getCommaCount(int $currentSentenceWordCount)
    {

        $commas = 0;

        if ($currentSentenceWordCount >= 5 && $currentSentenceWordCount <= 9) {
            $commas = 1;
        } elseif ($currentSentenceWordCount >= 10) {
            $commas = 2;
        }

        return $commas;
    }

    public function getTitles(int $paragraphCount) {
        
        $titles = Album::all();
        $currentTitles = [];

        for ($i = 0; $i < $paragraphCount; $i++) {
            array_push($currentTitles, $titles->random(1)->sole()->title);
        }

        return $currentTitles;
    }
}
