<?php

namespace Ekkinox\KataAlphabetWars\Test\Integration;

use Ekkinox\KataAlphabetWars\BattleField;
use Ekkinox\KataAlphabetWars\Factory\ShelterFactory;
use PHPUnit\Framework\TestCase;

/**
 * @package Ekkinox\KataAlphabetWars\Test\Integration
 */
class BattleFieldTest extends TestCase
{
    /**
     * @var BattleField
     */
    private $subject;

    /**
     * @inheritdoc
     */
    public function setUp()
    {
        parent::setUp();

        $this->subject = new BattleField(new ShelterFactory());
    }

    /**
     * @covers \Ekkinox\KataAlphabetWars\BattleField
     */
    public function testValidScenarios()
    {
        foreach ($this->getValidScenarios() as $battleField => $expectedSurvivors)
        {
            $this->assertEquals($expectedSurvivors, $this->subject->getSurvivors($battleField));
        }
    }

    /**
     * @covers \Ekkinox\KataAlphabetWars\BattleField
     *
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Shelter insiders cannot contain a nuclear bomb: #b given
     */
    public function testInvalidScenario()
    {
        $this->subject->getSurvivors('a[#b]c');
    }

    /**
     * @return array
     */
    private function getValidScenarios(): array
    {
        return [
            'a'                    => 'a',
            'abde[fgh]ijk'         => 'abdefghijk',
            'ab#de[fgh]ijk'        => 'fgh',
            'ab#de[fgh]ij#k'       => "",
            '##abde[fgh]ijk'       => "",
            '##abde[fgh]ijk[mn]op' => "mn",
            '#ab#de[fgh]ijk[mn]op' => "mn",
            '#abde[fgh]i#jk[mn]op' => "mn",
            '[a]#[b]#[c]'          => "ac",
            '[a]#b#[c][d]'         => "d",
            '[a][b][c]'            => "abc",
            '##a[a]b[c]#'          => "c"
        ];
    }
}
