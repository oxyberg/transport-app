<?php

class Bus extends MotorTransport
{

    private $path;

    public function getPath()
    {
        return $this->path;
    }

    public function setPath($value)
    {
        $this->path = $value;
    }

}
