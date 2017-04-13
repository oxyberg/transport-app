<?php

class Ship extends SeaTransport
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

    public function payForTicket()
    {
        $distance = $this->getDistance();
        $priceD = $distance * 3;
        $priceI = 0;
        if ($this->isInternational()) $priceI = $distance / 2;
        return $priceD + $priceI;
    }

}
