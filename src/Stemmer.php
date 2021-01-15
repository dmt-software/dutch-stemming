<?php

namespace DMT\Dutch\Stemming;

use DMT\Dutch\Stemming\Stemmer\NounStemmer;
use DMT\Dutch\Stemming\Type\Noun;

class Stemmer
{
    /**
     * Get the stem for a word.
     *
     * @param string $word
     * @param string $type
     *
     * @return WordInterface
     *
     * @todo switch stemmer on type
     */
    public function stem(string $word, string $type = Noun::class): WordInterface
    {
        $stemmer = new NounStemmer();

        return $stemmer->stem($word);
    }
}