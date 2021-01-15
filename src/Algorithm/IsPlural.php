<?php


namespace DMT\Dutch\Stemming\Algorithm;

use DMT\Dutch\Stemming\Helper\WordHelper;
use DMT\Dutch\Stemming\WordInterface;

/**
 * Class IsPlural
 *
 * Check if the word is plural and store it as stem when it does not.
 */
class IsPlural implements AlgorithmInterface
{
    /**
     * Apply the algorithm.
     *
     * @param WordInterface $word
     * @return bool true to stop propagation.
     */
    public function __invoke(WordInterface $word): bool
    {
        if (!WordHelper::isPlural($word)) {
            $word->setStem($word);
            return true;
        }

        return false;
    }
}