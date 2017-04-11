<?php

class Car extends MotorTransport
{

    private $bodyType;

    public function getBodyType()
    {
        return $this->bodyType;
    }

    public function setBodyType($value)
    {
        $this->bodyType = $value;
    }

}
