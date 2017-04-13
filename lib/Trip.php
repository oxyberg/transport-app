<?php

class Trip extends Graph
{

    private $listOfTransport = [];

    public function buildRoute($a, $b)
    {
        define('INFINITY', 1000000000);
        $routes = $this->convertVertices(Map::getAdj(), 'num'); // convert all vertices to numbers
        $s = ord($a) - 97; // starting vertex
        $n = count($routes); // number of vertices

        // some Dijkstra magic
        $d = [];
        for ($i = 0; $i < $n; $i++) $d[$i] = INFINITY;
        $d[$s] = 0;
        $p = [];
        $u = array_fill(0, $n, 0);
        for ($i = 0; $i < $n; $i++)
        {
            $v = -1;
            for ($j = 0; $j < $n; $j++) if (! $u[$j] && ($v == -1 || $d[$j] < $d[$v])) $v = $j;
            if ($d[$v] == INFINITY) break;
            $u[$v] = true;
            for ($j = 0; $j < count($routes[$v]); $j++)
            {
                $to = $routes[$v][$j][0];
                $len = $routes[$v][$j][1];
                if ($d[$v] + $len < $d[$to])
                {
                    $d[$to] = $d[$v] + $len;
                    $p[$to] = $v;
                }
            }
        }

        // trace path
        $path = [];
        for ($v = ord($b) - 97; $v != $s; $v = $p[$v]) $path[] = $v;
        $path[] = $s;
        $path = array_reverse($path);
        return $path;
    }

    public function assignTransport($path, $cheap = true)
    {
        $symPath = [];
        foreach ($path as $city) $symPath[] = chr($city + 97);

        $assignees = [];
        for ($i = 0; $i < count($symPath) - 1; $i++)
        {
            $assignees[] = $this->findVehicle($symPath[$i], $symPath[$i + 1], $cheap);
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
