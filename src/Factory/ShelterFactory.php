<?php declare(strict_types = 1);

namespace Ekkinox\KataAlphabetWars\Factory;

use Ekkinox\KataAlphabetWars\Model\Shelter;

/**
 * @package Ekkinox\KataAlphabetWars\Factory
 */
class ShelterFactory
{
    /**
     * @param string $content
     * @param string $leftSide
     * @param string $rightSide
     *
     * @return Shelter
     */
    public function create(string $content, string $leftSide, string $rightSide): Shelter
    {
        return new Shelter($content, $leftSide, $rightSide);
    }
}
