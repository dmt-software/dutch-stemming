<?php

namespace DMT\Dutch\Stemming\Type;

use DMT\Dutch\Stemming\WordInterface;

final class Noun implements WordInterface
{
    /** @var string */
    private $stem;
    /** @var string */
    private $value;

    /**
     * Noun constructor.
     *
     * @param string $noun
     */
    public function __construct(string $noun)
    {
        $this->value = $noun;
    }

    public function getType(): string
    {
        return self::TYPE_NOUN;
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public function getStem(): ?string
    {
        return $this->stem;
    }

    public function setStem(string $stem): void
    {
        $this->stem = $stem;
    }
}
