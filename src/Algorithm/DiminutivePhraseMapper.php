<?php

namespace DMT\Dutch\Stemming\Algorithm;

use DMT\Dutch\Stemming\WordInterface;

class DiminutivePhraseMapper implements AlgorithmInterface
{
    const DIMINUTIVE_MAPPING = [
        '~(?<=[aeiouj])(([^aeiouj])\2?)inkjes?$~' => '$1ing',
        '~(?<=[aeiouj])(([^aeiouj]?)(\2|ng))(?<=[^aeiouj])etjes?$~' => '$3',
        '~(aa|ee|ie|oo|oe|ij|ui)mpjes?$~' => '$1m',
    ];

    /**
     * Apply the algorithm.
     *
     * @param WordInterface $word
     * @return bool true to stop propagation.
     */
    public function __invoke(WordInterface $word): bool
    {
        $searches = array_keys(static::DIMINUTIVE_MAPPING);
        $replaces = array_values(static::DIMINUTIVE_MAPPING);
        $diminutive = preg_replace($searches, $replaces, $word);

        if ($diminutive != $word) {
            $word->setStem($diminutive);
            return true;
        }

        return false;
    }
}