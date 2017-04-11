<?php

class Boat extends SeaTransport
{

    private $numberOfOars;

    public function getNumberOfOars()
    {
        return $this->numberOfOars;
    }

    public function setNumberOfOars($value)
    {
        $this->numberOfOars = $value;
    }

}
