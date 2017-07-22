<?php declare(strict_types = 1);

namespace Ekkinox\KataAlphabetWars\Factory;

use Ekkinox\KataAlphabetWars\Model\Soldier;

/**
 * @package Ekkinox\KataAlphabetWars\Factory
 */
class SoldierFactory
{
    /**
     * @param string $name
     *
     * @return Soldier
     */
    public function create(string $name): Soldier
    {
        return new Soldier($name);
    }
}
