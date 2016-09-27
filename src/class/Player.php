<?php

class Player
{
    private $name;
    private $currentPoint;
    private $currentGame;
    private $currentSet;
    private $equality;
    private $advantage;
    private $winner;

    public function __construct($name = "")
    {
        $this->name         = $name;
        $this->currentGame  = 0;
        $this->currentPoint = 0;
        $this->currentSet   = 0;
        $this->equality     = false;
        $this->advantage    = false;
        $this->winner       = false;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function addPoint()
    {
        $this->currentPoint++;
    }

    public function addGame()
    {
        $this->currentGame++;
    }

    public function addSet()
    {
        $this->currentSet++;
    }

    public function setAdvantage()
    {
        $this->advantage   = true;
        $this->equality    = false;
    }

    public function setEquality()
    {
        $this->advantage   = false;
        $this->equality    = true;
    }

    public function setWinner(){
        $this->winner      = true;
        $this->advantage   = false;
        $this->equality    = false;
    }

    public function getPoint()
    {
        return $this->currentPoint;
    }

    public function getGame()
    {
        return $this->currentGame;
    }

    public function getSet()
    {
        return $this->currentSet;
    }

    public function isWinner()
    {
        return $this->winner;
    }

    public function getConvertedPoint() {
        $tennisPoint = array(0, 15, 30, 40);

    }
}