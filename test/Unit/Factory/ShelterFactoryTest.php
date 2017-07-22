<?php

namespace Ekkinox\KataAlphabetWars\Test\Factory;

use Ekkinox\KataAlphabetWars\Factory\ShelterFactory;
use Ekkinox\KataAlphabetWars\Factory\SoldierFactory;
use Ekkinox\KataAlphabetWars\Model\Soldier;
use PHPUnit\Framework\TestCase;
use PHPUnit_Framework_MockObject_MockObject;

/**
 * @package Ekkinox\KataAlphabetWars\Test\Factory
 */
class ShelterFactoryTest extends TestCase
{
    /**
     * @var ShelterFactory
     */
    private $subject;

    /**
     * @var SoldierFactory|PHPUnit_Framework_MockObject_MockObject
     */
    private $soldierFactoryMock;

    /**
     * @inheritdoc
     */
    public function setUp()
    {
        parent::setUp();

        $this->soldierFactoryMock = $this->createMock(SoldierFactory::class);
        $this->subject            = new ShelterFactory($this->soldierFactoryMock);
    }

    /**
     * @covers \Ekkinox\KataAlphabetWars\Factory\ShelterFactory
     */
    public function testCreate()
    {
        $map = [
            ['a', new Soldier('a')],
            ['b', new Soldier('b')],
            ['c', new Soldier('c')]
        ];

        $this->soldierFactoryMock
            ->expects($this->exactly(3))
            ->method('create')
            ->will($this->returnValueMap($map));

        $shelter = $this->subject->create('abc');

        $this->assertCount(3, $shelter->getSoldiers());

        foreach ($shelter->getSoldiers() as $soldier)
        {
            $this->assertInstanceOf(Soldier::class, $soldier);
        }
    }
}
