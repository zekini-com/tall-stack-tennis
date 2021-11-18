<?php

declare(strict_types=1);

namespace App\Helpers;

class Player
{
    public $pointLevel;

    protected $levelMapping = [
        0 => 'Love',
        1 => 'Fifteen',
        2 => 'Thirty',
        3 => 'Fourty',
        4 => 'Game',
    ];

    protected $points;

    protected $gamePoints = 0;

    public function __construct($pointLevel)
    {
        $this->pointLevel = $pointLevel ?? 0;
    }

    public function pointsMade()
    {
        return $this->pointLevel;
    }

    /**
     * This player has taken the game round
     */
    public function takeGame()
    {
        $this->pointLevel = 0;
        $this->gamePoints++;
    }

    public function gamesMade()
    {
        return $this->gamePoints;
    }

    /**
     * Returns the string of word indicating the player level
     *
     * @return string
     */
    public function pointText()
    {
        return $this->pointLevel >= 4 ? 'Game' : $this->levelMapping[$this->pointLevel];
    }
}
