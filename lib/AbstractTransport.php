<?php

abstract class AbstractTransport
{

    private
        $capacity, // how many people vehicle can transport
        $distance, // path's distance
        $moneyPerDistance, // coefficient for price
        $x, $y; // start and end points

    public function payForTicket() {}

    public function getCapacity()
    {
        return $this->capacity;
    }

    public function setCapacity($value)
    {
        $this->capacity = $value;
    }

    public function getMoneyPerDistance()
    {
        return $this->moneyPerDistance;
    }

    public function setMoneyPerDistance($value)
    {
        $this->moneyPerDistance = $value;
    }

    public function isInternational()
    {
        // make check for international by x and y
    }

    public function setPath($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function getPath()
    {
        return [$this->x, $this->y];
    }

}
