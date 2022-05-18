<?php

//---<> GESTIONNAIRE DE TOUTES LES ADRESSES <>---//
require_once "models/MainManager.class.php";
require_once "Town.class.php";


class TownManager extends MainManager{
    private $towns; //---<> TABLEAU DES VILLES <>---//

    public function addTown($town){
        $this->towns[] = $town;
    }

    public function getTowns(){
        return $this->towns;
    }

    // public function getTownInformations(){
    //     $stmt = $this->getBdd()->prepare("SELECT * FROM towns");
    //     $stmt->execute();
    //     $result = $stmt->fetch(PDO::FETCH_ASSOC);
    //     $stmt->closeCursor();
    //     return $result;
    // }

    public function addTownBdd($nameTown,$postalCode){
        // $idUser = $_SESSION['profile']['idUser'];    
        $req = "INSERT INTO towns  (name_town, postal_code)
        VALUES (:name_town, :postal_code)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":name_town",$nameTown,PDO::PARAM_STR);
        $stmt->bindValue(":postal_code",$postalCode,PDO::PARAM_INT);
        $result = $stmt->execute();
        $stmt->closeCursor();    
        // if($result > 0){                      //---<> RETOURNE L'ID DE LA DERNIERE INFORMATION ENVOYE EN BASE DE DONNEE <>---//
        //     $address = new Address($this->getBdd()->lastInsertId(),$streetNumber,$streetName,$additionalAddress,$idUser);
        //     $this->addAddress($address);
        // }
    }
}