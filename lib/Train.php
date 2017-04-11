<?php

class Train extends RailTransport
{

    private $travelPath;

    public function getTravelPath()
    {
        return $this->travelPath;
    }

    public function setTravelPath($value)
    {
        $this->travelPath = $value;
    }

}
