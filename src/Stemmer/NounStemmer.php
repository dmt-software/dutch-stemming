<?php

namespace DMT\Dutch\Stemming\Stemmer;

use DMT\Dutch\Stemming\Algorithm;
use DMT\Dutch\Stemming\Type\Noun;
use DMT\Dutch\Stemming\WordInterface;
use RuntimeException;

class NounStemmer
{
    protected $algorithms = [
        Algorithm\DiminutivePhraseMapper::class,
        Algorithm\DiminutiveStemmer::class,
        Algorithm\IsPlural::class,
        Algorithm\PluralPhraseMapper::class,
        Algorithm\PluralStemmer::class,
    ];

    /**
     * NounStemmer constructor.
     *
     * @param Algorithm\AlgorithmInterface[]|null $algorithms
     * @throws RuntimeException
     */
    public function __construct(array $algorithms = null)
    {
        if ($algorithms) {
            array_walk($algorithms, function ($algorithm) {
                if (!$algorithm instanceof Algorithm\AlgorithmInterface) {
                    throw new RuntimeException('Invalid algorithm given');
                }
            });
            $this->algorithms = $algorithms;
        }
    }

    public function stem(string $word): WordInterface
    {
        $noun = new Noun($word);

        foreach ($this->algorithms as $algorithm) {
            if (call_user_func(new $algorithm, $noun)) {
                break;
            }
        }

        return $noun;
    }
}