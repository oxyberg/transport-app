<?php

class Trip
{

    private $listOfTransport = [];

    public function addTransport($instance, $params)
    {
        $index = count($this->listOfTransport); // count next index
        $this->listOfTransport[$index] = $instance; // put instance of transport into array
        foreach ($params as $name => $value) { // loop through all the parameters and call setters
            call_user_func([$this->listOfTransport[$index], 'set' . ucfirst($name)], $value);
        }
    }

    public function countTotalPrice()
    {
        $total = 0;
        foreach ($this->listOfTransport as $item) {
            $total += $item->getTicketPrice();
        }
        return $total;
    }

    public function getListOfTransport()
    {
        return $this->listOfTransport;
    }

}
