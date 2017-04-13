<?php

class Trip extends Graph
{

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
        $assignees = [];
        for ($i = 0; $i < count($path) - 1; $i++)
        {
            $assignees = $this->findVehicle($path[$i], $path[$i + 1], $cheap);
        }
    }

    public function findVehicle($x, $y, $cheap = true)
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

}
