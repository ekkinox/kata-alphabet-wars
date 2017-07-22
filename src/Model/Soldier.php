<?php declare(strict_types = 1);

namespace Ekkinox\KataAlphabetWars\Model;

/**
 * @package Ekkinox\KataAlphabetWars\Model
 */
class Soldier
{
    /**
     * @var string
     */
    private $name;

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
