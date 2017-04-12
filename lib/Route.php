<?php

class Route
{

    public $adj = [];

    public $countries = [];

    public function loadRoutes($filename)
    {
        $file = file_get_contents($filename);
        $data = json_decode($file, true);
        $this->adj = $data['adjadency'];
        $this->countries = $data['countries'];
    }

    public function buildRoute($a, $b)
    {
        $routes = $this->convertVertices($this->adj, 'num'); // convert all vertices to numbers
        //define('INF', 1000000000); // infinity
        $s = ord($a) - 97; // starting vertex
        $n = 10; // change to dynamic
    }

    public function convertVertices($array, $to)
    {
        $new = [];
        foreach ($array as $vertex => $pairs)
        {
            $count = 0;
            foreach ($pairs as $pair)
            {
                if ($to == 'num')
                {
                    $new[ord($vertex) - 97][$count][0] = ord($pair[0]) - 97;
                    $new[ord($vertex) - 97][$count][1] = $pair[1];
                }
                else if ($to == 'sym')
                {
                    $new[chr($vertex + 97)][$count][0] = chr($pair[0] + 97);
                    $new[chr($vertex + 97)][$count][1] = $pair[1];
                }
                $count++;
            }
        }
        return $new;
    }

}
