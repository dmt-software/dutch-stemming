<?php

namespace DMT\Test\Dutch\Stemming\Helper;

use DMT\Dutch\Stemming\Helper\WordHelper as Helper;
use PHPUnit\Framework\TestCase;

class WordHelperTest extends TestCase
{
    /**
     * @dataProvider providePlural
     *
     * @param string $word
     * @param bool $plural
     */
    public function testIsPlural(string $word, bool $plural)
    {
        $this->assertSame($plural, Helper::isPlural($word), sprintf('invalid %s', $word));
    }

    public function providePlural(): array
    {
        return [
            ['auto', false],
            ["auto's", true],
            ['een', false],
            ['enen', true],
            ['twee', false],
            ['tweeën', true],
            ['vezel', false],
            ['vezels', true],
            ['werkman', false],
            ['werklui', true],
            ['medicus', false],
            ['medici', true],
            ['museum', false],
            ['musea', true],
            ['stadium', false],
            ['stadia', true],
            ['rots', false],
            ['rotsen', true],
            ['loopje', false],
            ['loopjes', true],
            ['lies', false],
            ['liezen', true],
        ];
    }

    /**
     * @dataProvider provideDiminutive
     *
     * @param string $word
     * @param bool $diminutive
     */
    public function testIsDiminutive(string $word, bool $diminutive)
    {
        $this->assertSame($diminutive, Helper::isDiminutive($word));
    }

    public function provideDiminutive(): array
    {
        return [
            ['paard', false],
            ['paardje', true],
            ['paardjes', true],
            ['klomp', false],
            ['klompje', true],
            ['klompjes', true],
            ['koning', false],
            ['koninkje', true],
            ['koninkjes', true],
            ['kom', false],
            ['kommetje', true],
            ['kommetjes', true],
            ['arm', false],
            ['armpje', true],
            ['armpjes', true],
        ];
    }

    /**
     * @dataProvider provideSingleSyllable
     *
     * @param string $word
     * @param bool $singleSyllable
     */
    public function testHasSingleSyllable(string $word, bool $singleSyllable)
    {
        $this->assertSame($singleSyllable, Helper::isSingleSyllable($word), $word);
    }

    public function provideSingleSyllable(): array
    {
        return [
            ['kaap', true],
            ['kapen', false],
            ['hoest', true],
            ['hoestje', false],
            ['beest', true],
            ['zeeën', false],
            ['huis', true],
            ['wee', true],
            ['odeur', false],
            ['aan', true],
            ['leeuw', true],
            ['snoei', true],
            ['föhn', true],
            ['lauw', true],
        ];
    }
}
