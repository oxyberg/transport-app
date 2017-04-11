<?php

class AirTransport extends AbstractTransport
{

    private $companyName;

    public function getCompanyName()
    {
        return $this->companyName;
    }

    public function setCompanyName($value)
    {
        $this->companyName = $value;
    }

}
