<?php


namespace DMT\Dutch\Stemming\Algorithm;

use DMT\Dutch\Stemming\WordInterface;

interface AlgorithmInterface
{
    /**
     * Apply the algorithm.
     *
     * @param WordInterface $word
     * @return bool true to stop propagation.
     */
    public function __invoke(WordInterface $word): bool;
}