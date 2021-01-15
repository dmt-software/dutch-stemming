<?php

namespace DMT\Dutch\Stemming\Algorithm;

use DMT\Dutch\Stemming\WordInterface;

class PluralPhraseMapper implements AlgorithmInterface
{
    /** @static A key-value pair for fixed stemming */
    const PLURAL_MAPPING = [
        '~heden$~' => 'heid',
        '~ci$~' => 'cus',
        '~ea$~' => 'eum',
        '~dia$~' => 'dium',
        '~(lui|lieden)$~' => 'man',
        '~((?<=[bpw])ad|(?<=w)eg|(?<=d)ak)en$~' => '$1',
    ];

    /**
     * Apply the algorithm.
     *
     * @param WordInterface $word
     * @return bool true to stop propagation.
     */
    public function __invoke(WordInterface $word): bool
    {
        $searches = array_keys(static::PLURAL_MAPPING);
        $replaces = array_values(static::PLURAL_MAPPING);
        $singular = preg_replace($searches, $replaces, $word);

        if ($singular != $word) {
            $word->setStem($singular);
            return true;
        }

        return false;
    }
}