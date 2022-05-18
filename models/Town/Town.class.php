<?php

class Town{
    private $idTown;
    private $nameTown;
    private $postalCode;

    public function __construct($idTown,$nameTown,$postalCode){
        $this->idTown = $idTown;
        $this->nameTown = $nameTown;
        $this->postalCode = $postalCode;
    }

    public function getIdTown()
    {
        return $this->idTown;
    }
    public function setIdTown($idTown)
    {
        $this->idTown= $idTown;
    }

    public function getNameTown()
    {
        return $this->nameTown;
    }
    public function setNameTown($nameTown)
    {
        $this->nameTown= $nameTown;
    }

    public function getPostalCode()
    {
        return $this->postalCode;
    }
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    }

}

