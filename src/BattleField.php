<?php declare(strict_types = 1);

namespace Ekkinox\KataAlphabetWars;

use Ekkinox\KataAlphabetWars\Factory\ShelterFactory;
use Ekkinox\KataAlphabetWars\Model\Shelter;
use InvalidArgumentException;

/**
 * @package Ekkinox\KataAlphabetWars
 */
class BattleField
{
    public const NUCLEAR_BOMB    = '#';
    private const SHELTERS_REGEX = '/\[([^\]]*)\]/';

    /**
     * @var ShelterFactory
     */
    private $shelterFactory;

    /**
     * @param ShelterFactory $shelterFactory
     */
    public function __construct(ShelterFactory $shelterFactory)
    {
        $this->shelterFactory = $shelterFactory;
    }

    /**
     * @param string $battleField
     *
     * @return string
     *
     * @throws InvalidArgumentException
     */
    public function getSurvivors(string $battleField): string
    {
        $survivors       = '';
        $outsidersGroups = $this->extractOutsidersGroups($battleField);
        $shelters        = $this->extractShelters($battleField);

        if (!$this->shouldOutsidersSurvive($outsidersGroups))
        {
            foreach ($shelters as $shelter)
            {
                $survivors .= $shelter->getSurvivors();
            }
        }
        else
        {
            if (!empty($shelters))
            {
                foreach ($shelters as $shelter)
                {
                    if (current($shelters) === $shelters[0])
                    {
                        $survivors .= $shelter->getLeftOutsiders();
                    }

                    $survivors.= $shelter->getSurvivors() . $shelter->getRightOutsiders();
                }
            }
            else
            {
                $survivors = implode('', $outsidersGroups);
            }
        }

        return $survivors;
    }

    /**
     * @param string $battleField
     *
     * @return array
     */
    private function extractOutsidersGroups(string $battleField): array
    {
        return preg_split(static::SHELTERS_REGEX, $battleField);
    }

    /**
     * @param string $battleField
     *
     * @return Shelter[]
     *
     * @throws InvalidArgumentException
     */
    private function extractShelters(string $battleField): array
    {
        $shelters        = [];
        $outsidersGroups = $this->extractOutsidersGroups($battleField);

        preg_match_all(static::SHELTERS_REGEX, $battleField, $matches, PREG_SET_ORDER);

        foreach($matches as $key => $match)
        {
            $shelters[] = $this->shelterFactory->create($match[1], $outsidersGroups[$key], $outsidersGroups[$key+1]);
        }

        return $shelters;
    }

    /**
     * @param array $outsidersGroups
     *
     * @return bool
     */
    private function shouldOutsidersSurvive(array $outsidersGroups): bool
    {
        foreach ($outsidersGroups as $outsiders)
        {
            if (substr_count($outsiders, static::NUCLEAR_BOMB) >= 1)
            {
                return false;
            }
        }

        return true;
    }
}
