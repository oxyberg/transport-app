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

}
