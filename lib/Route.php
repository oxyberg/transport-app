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

}
