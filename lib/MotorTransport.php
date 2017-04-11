<?php

class MotorTransport extends AbstractTransport
{

    private $carNumber;

    public function getCarNumber()
    {
        return $this->carNumber;
    }

    public function setCarNumber($value)
    {
        $this->carNumber = $value;
    }

}
