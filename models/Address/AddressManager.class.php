<?php

//---<> GESTIONNAIRE DE TOUTES LES ADRESSES <>---//
require_once "models/MainManager.class.php";
require_once "Address.class.php";


class AddressManager extends MainManager{
    private $addresses; //---<> TABLEAU DES ADRESSES <>---//

    public function addAddress($address){
        $this->addresses[] = $address;
    }

    public function getAddresses(){
        return $this->addresses;
    }

    public function getAddressInformations(){
        $stmt = $this->getBdd()->prepare("SELECT * FROM addresses");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $result;
    }

    public function addAddressBdd($streetNumber,$streetName,$additionalAddress){
        $idUser = $_SESSION['profile']['idUser'];    
        $req = "INSERT INTO addresses  (street_number, street_name, additional_address, idUser)
        VALUES (:street_number, :street_name, :additional_address, :idUser)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":street_number",$streetNumber,PDO::PARAM_INT);
        $stmt->bindValue(":street_name",$streetName,PDO::PARAM_STR);
        $stmt->bindValue(":additional_address",$additionalAddress,PDO::PARAM_STR);
        $stmt->bindValue(":idUser",$idUser,PDO::PARAM_INT);
        $result = $stmt->execute();
        $stmt->closeCursor();
    
        // if($result > 0){                      //---<> RETOURNE L'ID DE LA DERNIERE INFORMATION ENVOYE EN BASE DE DONNEE <>---//
        //     $address = new Address($this->getBdd()->lastInsertId(),$streetNumber,$streetName,$additionalAddress,$idUser);
        //     $this->addAddress($address);
        // }
    }
}