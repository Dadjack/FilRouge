<?php

class Cart{
    private $idCart;
    private $cartHourDate;
    private $idUser;

    public function __construct($idCart,$cartHourDate,$idUser){ 
        $this->idCart = $idCart;
        $this->cartHourDate = $cartHourDate;
        $this->idUser = $idUser;
    }

    public function getIdCart()
    {
        return $this->idCart;
    }
    public function setIdCart($idCart)
    {
        $this->idCart = $idCart;
    }

    public function getCartHourDate()
    {
        return $this->cartHourDate;
    }
    public function setCartHourDate($cartHourDate)
    {
        $this->cartHourDate = $cartHourDate;
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