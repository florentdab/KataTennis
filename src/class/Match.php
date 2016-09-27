<?php


class Match
{
    public $players = array();

    public function __construct($player1Name, $player2Name)
    {
        $this->players[1] = new Player($player1Name);
        $this->players[2] = new Player($player2Name);
    }

    public function setPoints($strPoints){
        $pointsNumber = strlen($strPoints);
        for ($index = 0; $index < $pointsNumber; $index++){
            if (!$this->players[1]->isWinner && !$this->players[2]->isWinner) {
                $point = substr($strPoints, $index, 1);
                if ($point == "1" or $point == "2") {
                    $this->players[strval($point)]->addPoint();
                    $winner = $this->getGameWinner();
                    if (!false === $winner) {
                        $this->players[$winner]->addGame();
                        $winner = $this->getSetWinner();
                        if (!false === $winner) {
                            $this->players[$winner]->addSet();
                            $winner = $this->getMatchWinner();
                            if (!false === $winner) {
                                $this->players[$winner]->setWinner = true;
                            }
                        }
                    }
                } else {
                    throw new Exception("Joueur inconnu !");
                }
            }
        }
    }

    public function getGameWinner() {
        $scorePlayer1 = $this->players[1]->getPoint();
        $scorePlayer2 = $this->players[2]->getPoint();
        if ($scorePlayer1 > 3 || $scorePlayer2 > 3) {
            if ($scorePlayer1 - $scorePlayer2 >= 2) {
                return 1;
            }
            if ($scorePlayer2 - $scorePlayer1 >= 2) {
                return 2;
            }
        }
        return false;
    }

    public function getSetWinner() {
        $scorePlayer1 = $this->players[1]->getGame();
        $scorePlayer2 = $this->players[2]->getGame();
        if ($scorePlayer1 > 5 || $scorePlayer2 > 5) {
            if ($scorePlayer1 - $scorePlayer2 >= 2) {
                return 1;
            }
            if ($scorePlayer2 - $scorePlayer1 >= 2) {
                return 2;
            }
        }
        return false;
    }

    public function getMatchWinner() {
        $scorePlayer1 = $this->players[1]->getSet();
        $scorePlayer2 = $this->players[2]->getSet();
        if ($scorePlayer1 > 5 || $scorePlayer2 > 5) {
            if ($scorePlayer1 - $scorePlayer2 >= 2) {
                return 1;
            }
            if ($scorePlayer2 - $scorePlayer1 >= 2) {
                return 2;
            }
        }
        return false;
    }

    public function getMatchScore(){
        $sets   = $this->players[0]->getSet() . "/" . $this->players[1]->getSet();
        $games  = $this->players[0]->getGame() . "/" . $this->players[1]->getGame();
        $points = $this->players[0]->getConvertedPoint() . "/" . $this->players[1]->getConvertedPoint();

        return $sets . ' - ' . $games . ' - ' . $points;
    }
}