<?php


namespace DMT\Dutch\Stemming\Algorithm;

use DMT\Dutch\Stemming\WordInterface;

class PluralStemmer implements AlgorithmInterface
{
    /**
     * Apply the algorithm.
     *
     * @param WordInterface $word
     * @return bool true to stop propagation.
     */
    public function __invoke(WordInterface $word): bool
    {
        preg_match("~('?s|ën|en)$~", $word, $m);

        $type = $m[1];
        $stem = preg_replace("~('?s|ën|en)$~", '', $word);

        if (preg_match('~([abcdfghijklmnopqrstuvwyz])\1$~', $stem)) {
            $stem = preg_replace('~([abcdfghijklmnopqrstuvwyz])\1$~', '$1', $stem);
        } elseif ($type === 'en' && preg_match('~(\b|[^aeiou])[aeiou][^aeiou]$~', $stem)) {
            $stem = preg_replace('~([aeou])([^aeiou])$~', '$1$1$2', $stem);
        }

        if (preg_match('~[ivz]$~', $stem)) {
            $stem = preg_replace(['~(?<![aeou])i$~', '~v$~', '~z$~'], ['ie', 'f', 's'], $stem);
        }

        $word->setStem($stem);

        return false;
    }
}