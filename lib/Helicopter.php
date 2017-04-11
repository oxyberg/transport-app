<?php

class Helicopter extends AirTransport
{

    private $numberOfPropellers;

    public function getNumberOfPropellers()
    {
        return $this->numberOfPropellers;
    }

    public function setNumberOfPropellers($value)
    {
        $this->numberOfPropellers = $value;
    }

}
