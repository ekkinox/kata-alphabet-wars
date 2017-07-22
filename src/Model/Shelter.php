<?php declare(strict_types = 1);

namespace Ekkinox\KataAlphabetWars\Model;

/**
 * @package Ekkinox\KataAlphabetWars\Model
 */
class Shelter
{
    /**
     * Walls constants
     */
    public const LEFT_WALL  = '[';
    public const RIGHT_WALL = ']';

    /**
     * @var Soldier[]
     */
    private $soldiers;

    /**
     * @param Soldier[] $soldiers
     */
    public function __construct(array $soldiers = [])
    {
        $this->soldiers = $soldiers;
    }

    /**
     * @return Soldier[]
     */
    public function getSoldiers(): array
    {
        return $this->soldiers;
    }

    /**
     * @param Soldier $soldier
     *
     * @return self
     */
    public function addSoldier(Soldier $soldier): self
    {
        $this->soldiers[] = $soldier;

        return $this;
    }

}


