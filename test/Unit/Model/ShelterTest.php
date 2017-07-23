<?php

namespace Ekkinox\KataAlphabetWars\Test\UNit\Model;

use Ekkinox\KataAlphabetWars\Model\Shelter;
use PHPUnit\Framework\TestCase;

/**
 * @package Ekkinox\KataAlphabetWars\Test\Model
 */
class ShelterTest extends TestCase
{
    /**
     * @covers \Ekkinox\KataAlphabetWars\Model\Shelter
     */
    public function testConstruct()
    {
        $subject = new Shelter('in', 'left', 'right');

        $this->assertEquals('in', $subject->getInsiders());
        $this->assertEquals('left', $subject->getLeftOutsiders());
        $this->assertEquals('right', $subject->getRightOutsiders());
    }

    /**
     * @covers \Ekkinox\KataAlphabetWars\Model\Shelter
     *
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Shelter insiders cannot contain a nuclear bomb: # given
     */
    public function testItCannotConstructWithBombInside()
    {
        new Shelter('#', 'left', 'right');
    }

    /**
     * @covers \Ekkinox\KataAlphabetWars\Model\Shelter
     */
    public function testItShouldNotBeDestroyedWithOneLeftBomb()
    {
        $subject = new Shelter('in', '#', 'right');

        $this->assertEquals('in', $subject->getSurvivors());
    }

    /**
     * @covers \Ekkinox\KataAlphabetWars\Model\Shelter
     */
    public function testItShouldNotBeDestroyedWithOneRightBomb()
    {
        $subject = new Shelter('in', 'left', '#');

        $this->assertEquals('in', $subject->getSurvivors());
    }

    /**
     * @covers \Ekkinox\KataAlphabetWars\Model\Shelter
     */
    public function testItShouldBeDestroyedWithTwoLeftBombs()
    {
        $subject = new Shelter('in', '##', 'right');

        $this->assertEquals('', $subject->getSurvivors());
    }

    /**
     * @covers \Ekkinox\KataAlphabetWars\Model\Shelter
     */
    public function testItShouldBeDestroyedWithTwoRightBombs()
    {
        $subject = new Shelter('in', 'left', '##');

        $this->assertEquals('', $subject->getSurvivors());
    }

    /**
     * @covers \Ekkinox\KataAlphabetWars\Model\Shelter
     */
    public function testItShouldBeDestroyedWithTwoBombsOnEachSide()
    {
        $subject = new Shelter('in', '#', '#');

        $this->assertEquals('', $subject->getSurvivors());
    }
}
