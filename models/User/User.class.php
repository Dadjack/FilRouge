<?php

class User{
    private $idUser;
    private $user_login;
    private $user_mail;
    private $user_password;
    private $user_name;
    private $user_firstname;
    private $user_phone;
    private $idRight;
        //---<> ATTRIBUT STATIC CONTENANT LA LISTE DES PRODUITS <>---//
            //---<> ELEMENT STATIC : C'EST UNE INFORMATION DIRECTEMENT ACCESSIBLE PAR LA CLASSE ET NON PAR LES OBJETS <>---//
        //public static $produits;
        //---<> L'ATTRIBUT STATIC DISPARAIT SUITE A LA MISE EN PLACE DU GESTIONNAIRE <>---//

    public function __construct($user_login,$user_mail,$user_password,$user_name,$user_firstname,$user_phone,$idRight){
        $this->user_login = $user_login;
        $this->user_mail = $user_mail;
        $this->user_password = $user_password;
        $this->user_name = $user_name;
        $this->user_firstname = $user_firstname;
        $this->user_phone = $user_phone;
        $this->idRight = $idRight;
            //---<> POUR REMPLIR LE TABLEAU STATIC NOUS LE FERONS DIRECTEMENT DANS LE <>---//
            //---<> CONSTRUCTEUR EN FAISANT APPEL A LATTRIBUT PAR L'INTERMEDIAIRE DU MOT CLE SELF :: <>---//
        //---<> self::$produits[] = $this; <>---//
        //---<> ON SUPPRIME SELF PUISQUE L'ATTRIBUT N'EXISTE PLUS <>---//
    }

    public function getIdUser()
    {
        return $this->idUser;
    }
    public function setIdUser($idUser)
    {
        $this->idUser= $idUser;
    }

    public function getUserLogin()
    {
        return $this->user_login;
    }
    public function setUserLogin($user_login)
    {
        $this->user_login= $user_login;
    }

    public function getUserMail()
    {
        return $this->user_mail;
    }
    public function setProductImage($user_mail)
    {
        $this->user_mail = $user_mail;
    }

    public function getUserPassword()
    {
        return $this->user_password;
    }
    public function setProductDescription($user_password)
    {
        $this->user_password = $user_password;
    }

    public function getProductQuantity()
    {
        return $this->user_name;
    }
    public function setProductQuantity($user_name)
    {
        $this->user_name = $user_name;
    }

    public function getUserFirstname()
    {
        return $this->user_firstname;
    }
    public function setUserFirstname($user_firstname)
    {
        $this->user_firstname = $user_firstname;
    }

    public function getUserPhone()
    {
        return $this->user_phone;
    }
    public function setUserPhone($user_phone)
    {
        $this->user_phone = $user_phone;
    }

    public function getIdRight()
    {
        return $this->idRight;
    }
    public function setIdRight($idRight)
    {
        $this->idRight = $idRight;
    }
}
