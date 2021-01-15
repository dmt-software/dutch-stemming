<?php

namespace DMT\Test\Dutch\Stemming\Algorithm;

use DMT\Dutch\Stemming\Algorithm\PluralStemmer;
use DMT\Dutch\Stemming\Type\Noun;
use PHPUnit\Framework\TestCase;

class PluralStemmerTest extends TestCase
{
    /**
     * @dataProvider providePlural
     *
     * @param string $word
     * @param string $stem
     */
    public function testAlgorithm(string $word, string $stem)
    {
        call_user_func(new PluralStemmer(), $noun = new Noun($word));

        $this->assertSame($stem, $noun->getStem());
    }

    public function providePlural()
    {
        return [
            ['dekens', 'deken'],
            ['platen', 'plaat'],
            ['zeeën', 'zee'],
            ['drieën', 'drie'],
            ['chemicaliën', 'chemicalie'],
            ["auto's", 'auto'],
            ['vlaaien', 'vlaai'],
            ['huizen', 'huis'],
            ['zeven', 'zeef'],
            ['pijen', 'pij'],
            ['truien', 'trui'],
            ['mensen', 'mens'],
        ];
    }
}
