<?php

namespace Ekkinox\KataAlphabetWars\Test\Factory;

use Ekkinox\KataAlphabetWars\Factory\SoldierFactory;
use Ekkinox\KataAlphabetWars\Model\Soldier;
use PHPUnit\Framework\TestCase;

/**
 * @package Ekkinox\KataAlphabetWars\Test\Factory
 */
class SoldierFactoryTest extends TestCase
{
    /**
     * @covers \Ekkinox\KataAlphabetWars\Factory\SoldierFactory
     */
    public function testCreate()
    {
        $subject = new SoldierFactory();
        $soldier = $subject->create('name');

        $this->assertInstanceOf(Soldier::class, $soldier);
        $this->assertEquals('name', $soldier->getName());
    }
}
