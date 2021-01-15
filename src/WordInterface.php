<?php

namespace DMT\Dutch\Stemming;

interface WordInterface
{
    public const TYPE_NOUN = 'noun';

    /**
     * Get the type off word.
     *
     * @return string
     */
    public function getType(): string;

    /**
     * Get the original value of the word.
     *
     * @return string
     */
    public function __toString(): string;

    /**
     * Get the stem from word.
     *
     * @return string|null
     */
    public function getStem(): ?string;

    /**
     * Set the stem.
     *
     * @param string $word
     */
    public function setStem(string $word): void;
}