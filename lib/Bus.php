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

}
