<?php

require_once "controllers/MainController.controller.php";
require_once "models/Administrator/AdministratorManager.class.php";

class AdministratorController extends MainController{
    private $administratorManager;

    public function __construct(){
        $this->administratorManager = new AdministratorManager();
    }

    public function rights(){
        $users = $this->administratorManager->getUsers();

        $data_page = [
            "page_description" => "Gestion des droits",
            "page_title" => "Gestion des droits",
            "users" => $users,
            "view" => "views/Administrator/rights.view.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page);
    }

    public function validationChangeRole($login,$role){
        if($this->administratorManager->validationChangeRoleBdd($login,$role)){
            Toolbox::addAlertMessage("La modification a été prise en compte",Toolbox::COULEUR_VERTE);
        } else {
            Toolbox::addAlertMessage("La modification n'a pas été prise en compte",Toolbox::COULEUR_ROUGE);
        }
        header("Location: ".URL."administration/droits");
    }

    public function errorPage($msg){
        parent::errorPage($msg);
    }
}