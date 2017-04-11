<?php

abstract class AbstractTransport
{

    private $capacity;
    private $ticketPrice;

    public function toMove() {}

    public function toPayForTicket() {}

    public function getCapacity()
    {
        return $this->capacity;
    }

    public function setCapacity($value)
    {
        $this->capacity = $value;
    }

    public function getTicketPrice()
    {
        return $this->ticketPrice;
    }

    public function setTicketPrice($value)
    {
        $this->ticketPrice = $value;
    }

}
