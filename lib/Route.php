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

    }

    public function convertVertices($array, $to)
    {
        $new = [];
        $count = 0;
        foreach ($array as $item)
        {
            if ($to == 'num')
            {
                $new[$count][0] = ord($item[0]) - 97;
                $new[$count][1] = ord($item[1]) - 97;
            }
            else if ($to == 'sym')
            {
                $new[$count][0] = chr($item[0] + 97);
                $new[$count][1] = chr($item[1] + 97);
            }
            $new[$count][2] = $item[2];
            $count++;
        }
        return $new;
    }

}
