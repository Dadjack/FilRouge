<?php

require_once "controllers/MainController.controller.php";
require_once "models/Address/AddressManager.class.php";

class AddressController extends MainController{
    private $addressManager;

    public function __construct(){
        $this->addressManager = new AddressManager();
    }


        //---<> PAGE D'AJOUT DE L'ADRESSE <>---//

    public function addAddress(){
        $data_page = [
            "page_description" => "Page de création de l'adresse",
            "page_title" => "Page de création de l'adresse",
            // "page_javascript"=> ["changePassword.js"],
            "view" => "views/User/addAddress.view.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page);
    }

         //---<> VALIDATION DE L'AJOUT DE L'ADRESSE <>---//

    public function addAddressValidation($streetNumber,$streetName,$additionalAdress){
            if($this->addressManager->addAddressBdd($streetNumber,$streetName,$additionalAdress)){
                Toolbox::addAlertMessage("L'adresse a été ajoutée ", Toolbox::COULEUR_VERTE);
                header('Location: '.URL. "account/profile");
            } else {
                Toolbox::addAlertMessage("L'adresse n'a pas été ajoutée ", Toolbox::COULEUR_ROUGE);
            } 
            header('Location: '.URL. "userAddress");
        } 
}

    

         

