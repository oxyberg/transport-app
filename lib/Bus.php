<?php

class Bus extends MotorTransport
{

    private $park;

    public function getPark()
    {
        return $this->park;
    }

    public function setPark($value)
    {
        $this->park = $value;
    }

    public function payForTicket()
    {
        $distance = $this->getDistance();
        $priceD = $distance * 1.5;
        $priceI = 0;
        if ($this->isInternational()) $priceI = $distance / 2;
        return $priceD + $priceI;
    }

}
