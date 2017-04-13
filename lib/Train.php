<?php

class Train extends RailTransport
{

    public function payForTicket()
    {
        $distance = $this->getDistance();
        $priceD = $distance * 2;
        $priceI = 0;
        if ($this->isInternational()) $priceI = $distance / 2;
        return $priceD + $priceI;
    }

}
