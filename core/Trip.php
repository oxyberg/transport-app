<?php

class Trip extends Graph
{

    private $listOfTransport = [];

    public function buildRoute($a, $b)
    {
        $routes = $this->convertVertices(Map::getAdj(), 'num'); // convert all vertices to numbers
        $n = count($routes); // number of vertices
        $path = $this->dijkstra($routes, $a, $b, $n);

        $symPath = [];
        foreach ($path as $city) $symPath[] = chr($city + 97);

        return $symPath;
    }

    public function assignTransport($path, $cheap = true)
    {
        $assignees = [];
        for ($i = 0; $i < count($path) - 1; $i++)
        {
            $assignees[] = $this->findVehicle($path[$i], $path[$i + 1], $cheap);
        }

        $this->listOfTransport = $assignees;
        return $assignees;
    }

    // find proper vehicle for pair of cities
    public function findVehicle($x, $y, $cheap = true)
    {
        $available = $this->searchVehicles($x, $y);
        if (count($available) == 1) return $available[0];
        else if ($cheap)
        {
            $min = $available[0];
            $minCost = $available[0]->payForTicket();
            foreach ($available as $vehicle) {
                if ($vehicle->payForTicket() < $minCost)
                {
                    $min = $vehicle;
                    $minCost = $vehicle->payForTicket();
                }
            }
            return $min;
        }
        else if ( ! $cheap)
        {
            $max = $available[0];
            $maxCost = $available[0]->payForTicket();
            foreach ($available as $vehicle) {
                if ($vehicle->payForTicket() > $maxCost)
                {
                    $max = $vehicle;
                    $maxCost = $vehicle->payForTicket();
                }
            }
            return $max;
        }
    }

    // find all the available vehicles for pair of cities
    public function searchVehicles($x, $y)
    {
        $available = [];
        foreach (Map::getTransportPaths() as $vehicle => $paths)
        {
            foreach ($paths as $path) {
                if (($path[0] == $x && $path[1] == $y) || ($path[0] == $y && $path[1] == $x))
                {
                    $tmp = new $vehicle();
                    $tmp->setPath($x, $y);
                    $available[] = $tmp;
                }
            }
        }
        return $available;
    }

    public function calcTotal()
    {
        $sum = 0;
        foreach ($this->listOfTransport as $vehicle) {
            $sum = $sum + $vehicle->payForTicket();
        }
        return $sum;
    }

    public function getListOfTransport()
    {
        return $this->listOfTransport;
    }

}
