<?php

namespace DMT\Dutch\Stemming\Algorithm;

use DMT\Dutch\Stemming\WordInterface;

class DiminutiveStemmer implements AlgorithmInterface
{

    /**
     * Apply the algorithm.
     *
     * @param WordInterface $word
     * @return bool true to stop propagation.
     */
    public function __invoke(WordInterface $word): bool
    {
        $diminutive = preg_replace('~((?<=[aeioujfksp]|ch)t)?jes?~', '$1', $word);

        if ($diminutive != $word) {
            $word->setStem($diminutive);
            return true;
        }

        return false;
    }
}