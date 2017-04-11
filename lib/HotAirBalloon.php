<?php

class HotAirBalloon extends AirTransport
{

    private $gasAmount;

    public function getGasAmount()
    {
        return $this->gasAmount;
    }

    public function setGasAmount($value)
    {
        $this->gasAmount = $value;
    }

}
