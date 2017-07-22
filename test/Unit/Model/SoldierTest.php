<?php

namespace Ekkinox\KataAlphabetWars\Test\Model;

use Ekkinox\KataAlphabetWars\Model\Soldier;
use PHPUnit\Framework\TestCase;

/**
 * @package Ekkinox\KataAlphabetWars\Test\Model
 */
class SoldierTest extends TestCase
{
    /**
     * @covers \Ekkinox\KataAlphabetWars\Model\Soldier
     */
    public function testNameIsSetAtConstruct()
    {
        $subject = new Soldier('name');

        $this->assertEquals('name', $subject->getName());
    }
}
