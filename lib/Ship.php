<?php

class Boat extends SeaTransport
{

    private $deck;

    public function getDeck()
    {
        return $this->deck;
    }

    public function setDeck($value)
    {
        $this->deck = $value;
    }

}
