<?php

namespace Ekkinox\KataAlphabetWars\Test\Unit\Factory;

use Ekkinox\KataAlphabetWars\Factory\ShelterFactory;
use Ekkinox\KataAlphabetWars\Model\Shelter;
use PHPUnit\Framework\TestCase;

/**
 * @package Ekkinox\KataAlphabetWars\Test\Unit\Factory
 */
class ShelterFactoryTest extends TestCase
{
    /**
     * @covers \Ekkinox\KataAlphabetWars\Factory\ShelterFactory
     */
    public function testCreate()
    {
        $shelterFactory = new ShelterFactory();

        $shelter = $shelterFactory->create('in', 'left', 'right');

        $this->assertInstanceOf(Shelter::class, $shelter);
        $this->assertEquals('in', $shelter->getInsiders());
        $this->assertEquals('left', $shelter->getLeftOutsiders());
        $this->assertEquals('right', $shelter->getRightOutsiders());
    }
}
