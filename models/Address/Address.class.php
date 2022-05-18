<?php

class Address{
    private $idAddress;
    private $streetNumber;
    private $streetName;
    private $additionalAddress;
    private $idUser;

    public function __construct($idAddress,$streetNumber,$streetName,$additionalAddress,$idUser){
        $this->idAddress = $idAddress;
        $this->streetNumber = $streetNumber;
        $this->streetName = $streetName;
        $this->additionalAddress = $additionalAddress;
        $this->idUser = $idUser;
    }

    public function getIdAddress()
    {
        return $this->idAddress;
    }
    public function setIdAddress($idAddress)
    {
        $this->idAddress= $idAddress;
    }

    public function getStreetNumber()
    {
        return $this->streetNumber;
    }
    public function setStreetNumber($streetNumber)
    {
        $this->streetNumber= $streetNumber;
    }

    public function getStreetName()
    {
        return $this->streetName;
    }
    public function setStreetName($streetName)
    {
        $this->streetName = $streetName;
    }

    public function getAdditionalAddress()
    {
        return $this->additionalAddress;
    }
    public function setAdditionalAddress($additionalAddress)
    {
        $this->additionalAddress = $additionalAddress;
    }

    public function getIdUser()
    {
        return $this->idUser;
    }
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

}
