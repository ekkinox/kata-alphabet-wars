<?php

namespace Ekkinox\KataAlphabetWars\Test\Model;

use Ekkinox\KataAlphabetWars\Model\Shelter;
use Ekkinox\KataAlphabetWars\Model\Soldier;
use PHPUnit\Framework\TestCase;

/**
 * @package Ekkinox\KataAlphabetWars\Test\Model
 */
class ShelterTest extends TestCase
{
    /**
     * @covers \Ekkinox\KataAlphabetWars\Model\Shelter
     */
    public function testSoldiersAreSetAtConstruct()
    {
        $soldiers = [
            new Soldier('a'),
            new Soldier('b')
        ];

        $subject = new Shelter($soldiers);

        $this->assertCount(2, $subject->getSoldiers());
    }

    /**
     * @covers \Ekkinox\KataAlphabetWars\Model\Shelter
     */
    public function testItCanAddSoldier()
    {
        $soldiers = [
            new Soldier('a'),
            new Soldier('b')
        ];

        $subject = new Shelter($soldiers);

        $subject->addSoldier(new Soldier('c'));

        $this->assertCount(3, $subject->getSoldiers());
    }
}
