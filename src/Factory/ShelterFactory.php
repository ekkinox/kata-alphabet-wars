<?php declare(strict_types = 1);

namespace Ekkinox\KataAlphabetWars\Factory;

use Ekkinox\KataAlphabetWars\Model\Shelter;

/**
 * @package Ekkinox\KataAlphabetWars\Factory
 */
class ShelterFactory
{
    /**
     * @var SoldierFactory
     */
    private $soldierFactory;

    /**
     * @param SoldierFactory $soldierFactory
     */
    public function __construct(SoldierFactory $soldierFactory)
    {
        $this->soldierFactory = $soldierFactory;
    }

    /**
     * @param string $names
     *
     * @return Shelter
     */
    public function create(string $names): Shelter
    {
        $shelter = new Shelter();

        foreach (str_split($names) as $name)
        {
            $shelter->addSoldier($this->soldierFactory->create($name));
        }

        return $shelter;
    }
}
