<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Http\Livewire\TennisGame;
use Tests\TestCase;

class TennisGameTest extends TestCase
{
    /**
     * same score below 3 points
     */
    public function testSameScoreBelowThreePointsGetAllSuffix()
    {
        $tennisGame = new TennisGame();
        // give player1 a score
        $tennisGame->player1Point();
        $tennisGame->player2Point();

        $outText = 'Fifteen All';

        // assert that the score board has all fifteen
        $this->assertSame($outText, $tennisGame->scoreboard());
    }

    /**
     * atleast 3 points and scores are equal
     */
    public function testBothHasAtleast3PointsAndEqualScores()
    {
        $tennisGame = new TennisGame();
        // give player1 three scores
        $tennisGame->player1Point();
        $tennisGame->player1Point();
        $tennisGame->player1Point();

        // give player 2 three score
        $tennisGame->player2Point();
        $tennisGame->player2Point();
        $tennisGame->player2Point();

        $outText = 'Deuce';

        // assert that the score board text is deuce
        $this->assertSame($outText, $tennisGame->scoreboard());
    }

    /**
     * atleast 3 points and one player has one more
     */
    public function testBothHasAtleast3PointsAndOnePlayerHasOneMore()
    {
        $tennisGame = new TennisGame();

        $tennisGame->player1Point();
        $tennisGame->player2Point();

        $tennisGame->player1Point();
        $tennisGame->player2Point();

        $tennisGame->player1Point();
        $tennisGame->player2Point();

        $tennisGame->player1Point();

        $outText = 'Advantage Fourty';

        // assert that the score board has all fifteen
        $this->assertSame($outText, $tennisGame->scoreboard());
    }

    /**
     * a game is won by the first player to get atleast 4 and 2 more than the other
     */
    public function testAGameIsWonByFirstPlayerToHaveToAtleast4And2More()
    {
        $tennisGame = new TennisGame();

        $tennisGame->player1Point();
        $tennisGame->player2Point();

        $tennisGame->player1Point();
        $tennisGame->player2Point();

        $tennisGame->player1Point();
        $tennisGame->player2Point();

        $tennisGame->player1Point();
        $tennisGame->player1Point();

        $outText = 'Player 1 won the match';

        // assert that the score board has all fifteen
        $this->assertSame($outText, $tennisGame->scoreboard());
    }

    /**
     * no score is recorded once game has ended
     */
    public function testScoreIsNotRecordedOnceGameHasEnded()
    {
        $tennisGame = new TennisGame();

        $tennisGame->player1Point();
        $tennisGame->player2Point();

        $tennisGame->player1Point();
        $tennisGame->player2Point();

        $tennisGame->player1Point();
        $tennisGame->player2Point();

        $tennisGame->player1Point();
        $tennisGame->player1Point();

        $tennisGame->scoreboard();

        // An extra entry for player 2
        $tennisGame->player2Point();

        $this->assertSame($tennisGame->player2Point, 3);
    }
}
