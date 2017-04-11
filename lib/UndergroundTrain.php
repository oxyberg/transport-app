<?php

class UndergroundTrain extends RailTransport
{

    private $branchLineName;

    public function getBranchLineName()
    {
        return $this->branchLineName;
    }

    public function setBranchLineName($value)
    {
        $this->branchLineName = $value;
    }

}
