<?php

namespace DMT\Dutch\Stemming\Helper;

class WordHelper
{
    /**
     * Check if a word is a diminutive.
     *
     * @param string $word
     * @return bool
     */
    public static function isDiminutive(string $word): bool
    {
        return preg_match('~(?<!i)jes?$~', $word) !== 0;
    }

    /**
     * Check if a word is plural.
     *
     * @param string $word
     * @return bool
     */
    public static function isPlural(string $word): bool
    {
        $expression =
            "~('s|(?<![taeiouj])s|ën|ci|ea|[aeiou]dia)$"
            . '|([^aeiou]es)$'
            . '|(([aeiou]{2}|[^aeiou])en)$'
            . '|([^aeiou](lui|lieden))$~';

        return !self::isSingleSyllable($word) && preg_match($expression, $word) !== 0;
    }

    /**
     * Check if a word consists of one single syllable.
     *
     * @param string $word
     * @return bool
     */
    public static function isSingleSyllable(string $word): bool
    {
        $expression = '~(aai|eeu|oei|ooi|ieu|aa|ai|au|ee|ei|eu|ey|ie|ij|oo|oe|ou|uu|ui|a|e|i|o|u|y|ä|ë|ï|ö|ü)~';

        return preg_match_all($expression, $word) === 1;
    }

}