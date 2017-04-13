<?php

class Plane extends AirTransport
{

    private $numberOfMotors;

    public function getNumberOfMotors()
    {
        return $this->numberOfMotors;
    }

    public function setNumberOfMotors($value)
    {
        $this->numberOfMotors = $value;
    }

    public function payForTicket()
    {
        $distance = $this->getDistance();
        $priceD = $distance * 6;
        $priceI = 0;
        if ($this->isInternational()) $priceI = $distance / 2;
        return $priceD + $priceI;
    }

}
