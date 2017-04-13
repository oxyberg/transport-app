<?php

abstract class AbstractTransport
{

    private
        $capacity, // how many people vehicle can transport
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

    // check if path is international
    public function isInternational()
    {
        $startCountry = '';
        $finishCountry = '';
        foreach (Map::getCountries() as $country => $cities)
        {
            if (in_array($this->x, $cities)) $startCountry = $country;
            if (in_array($this->y, $cities)) $finishCountry = $country;
        }
        if ($startCountry != $finishCountry) return true;
        else return false;
    }

    public function getDistance()
    {
        $paths = Map::getAdj()[$this->x];
        foreach ($paths as $path)
        {
            if ($path[0] == $this->y) return $path[1];
        }
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
