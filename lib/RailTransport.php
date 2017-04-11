<?php

class RailTransport extends AbstractTransport
{

    private $numberOfCarriages;

    public function getNumberOfCarriages()
    {
        return $this->numberOfCarriages;
    }

    public function setNumberOfCarriages($value)
    {
        $this->numberOfCarriages = $value;
    }

}
