<?php

class Tram extends RailTransport
{

    private $listOfStops;

    public function getListOfStops()
    {
        return $this->listOfStops;
    }

    public function setListOfStops($value)
    {
        $this->listOfStops = $value;
    }

}
