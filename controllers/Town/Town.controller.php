<?php

require_once "controllers/MainController.controller.php";
require_once "models/Town/TownManager.class.php";

class TownController extends MainController{
    private $townManager;

    public function __construct(){
        $this->townManager = new TownManager();
    }

    //---<> AJOUT D'UNE VILLE <>---//

    public function addTown(){
        $data_page = [
            "page_description" => "Page de création de l'adresse",
            "page_title" => "Page de création de l'adresse",
            // "page_javascript"=> ["changePassword.js"],
            "view" => "views/User/addTown.view.php",
            "template" => "views/common/template.php"
            ];
            $this->generatePage($data_page);
        }
        
                 //---<> VALIDATION DE L'AJOUT DE L'ADRESSE <>---//
        
    public function addTownValidation($nameTown,$postalCode){
        $this->townManager->addTownBdd($nameTown,$postalCode);
            Toolbox::addAlertMessage("L'adresse a été ajoutée ", Toolbox::COULEUR_VERTE);
            header('Location: ' . URL . "account/profile");
        } 
}