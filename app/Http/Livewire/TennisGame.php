<?php

declare(strict_types=1);

namespace App\Http\Livewire;

use App\Contracts\TennisGameContract;
use App\Helpers\ScoreBoard;
use Livewire\Component;

class TennisGame extends Component implements TennisGameContract
{
    public $player1Point = 0;

    public $player2Point = 0;

    public $gameEnded = false;

    /**
     * Records the score by each player
     *
     * @var mixed
     */
    protected $scoreboardRecorder;

    public function resetGame()
    {
        $this->player1Point = 0;
        $this->player2Point = 0;
        $this->gameEnded = false;
    }

    /**
     * simulate a service and the output of rand is the player that won
     */
    public function serve()
    {
        $winner = rand(1, 2);

        $winner === 1 ? $this->player1Point() : $this->player2Point();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $result = $this->scoreboard();
        return view('livewire.tennis-game', [
            'result' => $result,
        ]);
    }

    /**
     * Displays the score board text for both players
     */
    public function scoreboard(): string
    {
        $this->scoreboardRecorder = new ScoreBoard($this->player1Point, $this->player2Point);
        if ($this->scoreboardRecorder->gameEnded) {
            $this->gameEnded = true;
        }
        return $this->scoreboardRecorder->showScoreText();
    }

    /**
     * Checks if the match has been completed
     */
    public function isComplete(): bool
    {
        return $this->gameEnded;
    }

    /**
     * Called when player 1 gets a point
     */
    public function player1Point(): void
    {
        if ($this->isComplete()) {
            return;
        }
        $this->player1Point++;
    }

    /**
     * Called when player 2 gets a point
     */
    public function player2Point(): void
    {
        if ($this->isComplete()) {
            return;
        }
        $this->player2Point++;
    }
}
