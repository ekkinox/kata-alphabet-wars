<?php declare(strict_types = 1);

namespace Ekkinox\KataAlphabetWars\Model;

use Ekkinox\KataAlphabetWars\BattleField;
use InvalidArgumentException;

/**
 * @package Ekkinox\KataAlphabetWars\Model
 */
class Shelter
{
    /**
     * @var string
     */
    private $insiders;

    /**
     * @var string
     */
    private $leftOutsiders;

    /**
     * @var string
     */
    private $rightOutsiders;

    /**
     * @param string $insiders
     * @param string $leftOutsiders
     * @param string $rightOutsiders
     *
     * @throws InvalidArgumentException
     */
    public function __construct(string $insiders, string $leftOutsiders, string $rightOutsiders)
    {
        $this->insiders       = $insiders;
        $this->leftOutsiders  = $leftOutsiders;
        $this->rightOutsiders = $rightOutsiders;

        $this->performInsideBombDetection();
    }

    /**
     * @return string
     */
    public function getInsiders(): string
    {
        return $this->insiders;
    }

    /**
     * @return string
     */
    public function getLeftOutsiders(): string
    {
        return $this->leftOutsiders;
    }

    /**
     * @return string
     */
    public function getRightOutsiders(): string
    {
        return $this->rightOutsiders;
    }

    /**
     * @return string
     */
    public function getSurvivors(): string
    {
        return $this->shouldBeDestroyed() ? '' : $this->insiders;
    }

    /**
     * @return void
     *
     * @throws InvalidArgumentException
     */
    private function performInsideBombDetection(): void
    {
        if (substr_count($this->insiders, BattleField::NUCLEAR_BOMB) >= 1)
        {
            throw new InvalidArgumentException(
                sprintf('Shelter insiders cannot contain a nuclear bomb: %s given', $this->insiders)
            );
        }
    }

    /**
     * @return bool
     */
    private function shouldBeDestroyed(): bool
    {
        return substr_count($this->leftOutsiders, BattleField::NUCLEAR_BOMB)
            + substr_count($this->rightOutsiders, BattleField::NUCLEAR_BOMB) >= 2;
    }
}
