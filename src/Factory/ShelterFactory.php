<?php declare(strict_types = 1);

namespace Ekkinox\KataAlphabetWars\Factory;

use Ekkinox\KataAlphabetWars\Model\Shelter;
use InvalidArgumentException;

/**
 * @package Ekkinox\KataAlphabetWars\Factory
 */
class ShelterFactory
{
    /**
     * @param string $insiders
     * @param string $leftOutsiders
     * @param string $rightOutsiders
     *
     * @return Shelter
     *
     * @throws InvalidArgumentException
     */
    public function create(string $insiders, string $leftOutsiders, string $rightOutsiders): Shelter
    {
        return new Shelter($insiders, $leftOutsiders, $rightOutsiders);
    }
}
