<?php

declare(strict_types=1);

namespace App\Helpers;

class ScoreBoard
{
    public const MAX_POINTS = 4; // 4 points required to win a game

    public const MAX_GAMES = 6; // 6 games required to win a set

    public $gameEnded;

    protected $player1;

    protected $player2;

    public function __construct($player1, $player2)
    {
        $this->player1 = new Player($player1);
        $this->player2 = new Player($player2);
        $this->gameEnded = $this->gameWinnerFound() ? true : false;
    }

    /**
     * Displays the score text
     *
     * @return string
     */
    public function showScoreText()
    {
        if ($this->gameEnded) {
            return $this->getWinner();
        }

        $player1ScoreText = $this->player1->pointText();
        $player1ScoreLevel = $this->player1->pointsMade();

        $player2ScoreText = $this->player2->pointText();
        $player2ScoreLevel = $this->player2->pointsMade();

        if ($player1ScoreLevel === $player2ScoreLevel) {
            return $player1ScoreLevel < 3 ? "${player1ScoreText} All" : 'Deuce';
        }

        if (($player1ScoreLevel >= 3) && ($player2ScoreLevel >= 3)) {
            if ($player1ScoreLevel > $player2ScoreLevel) {
                $player1ScoreText = 'Advantage';
            }

            if ($player2ScoreLevel > $player1ScoreLevel) {
                $player2ScoreText = 'Advantage';
            }
        }

        return "${player1ScoreText} ${player2ScoreText}";
    }

    /**
     * Displays the winner
     */
    public function getWinner()
    {
        if ($this->player1->pointsMade() > $this->player2->pointsMade()) {
            return 'Player 1 won the match';
        }

        return 'Player 2 won the match';
    }

    /**
     * A user can take a game if the difference between their scores
     * is atleast 2
     *
     * @return bool
     */
    protected function gameWinnerFound()
    {
        $player1ScoreLevel = $this->player1->pointsMade();
        $player2ScoreLevel = $this->player2->pointsMade();

        // one person has scored atleast 4 points
        $atleast4points = max($player2ScoreLevel, $player1ScoreLevel) >= 4;
        $atleast2pointsDiff = abs($player1ScoreLevel - $player2ScoreLevel) >= 2;

        return $atleast2pointsDiff && $atleast4points;
    }
}
