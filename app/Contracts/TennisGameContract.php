<?php

declare(strict_types=1);

namespace App\Contracts;

interface TennisGameContract
{
    /**
     * Displays the score board text for both players
     */
    public function scoreboard(): string;

    /**
     * Checks if the match has been completed
     */
    public function isComplete(): bool;

    /**
     * Called when player 1 gets a point
     */
    public function player1Point(): void;

    /**
     * Called when player 2 gets a point
     */
    public function player2Point(): void;
}
