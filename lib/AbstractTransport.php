<?php

abstract class AbstractTransport
{

    private
        $capacity, // how many people vehicle can transport
        $distance, // path's distance
        $moneyPerDistance, // coefficient for price
        $isInternational; // flag for type

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

    public function getIsInternational()
    {
        return $this->isInternational;
    }

    public function setIsInternational(bool $value)
    {
        $this->isInternational = $value;
    }

}
