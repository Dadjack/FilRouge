<?php

require_once "controllers/MainController.controller.php";
require_once "models/Visitor/VisitorManager.class.php";
// require_once "models/Product/ProductManager.class.php";

class VisitorController extends MainController{
    private $visitorManager;


    public function __construct(){
        $this->visitorManager = new VisitorManager();

    }
    //---<> FONCTIONS POUR LES VISITEURS <>---//

     //Propriété "page_css" : tableau permettant d'ajouter des fichiers CSS spécifiques
    public function home(){
        $users = $this->visitorManager->getUsers();
        $data_page = [
            "page_description" => "Description de la page d'accueil",
            "page_title" => "Titre de la page d'accueil",
            "page_css" => ['style.css'],
            "page_css" => ['home.css'],
            "view" => "views/Visitor/home.view.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page);
    }

    public function login(){
        $data_page = [
            "page_description" => "Page de connexion",
            "page_title" => "Page de connexion",
            "view" => "views/Visitor/login.view.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page);
    }

    public function createAccount(){
        $data_page = [
            "page_description" => "Page de création de compte",
            "page_title" => "Page de création de compte",
            "view" => "views/Visitor/createAccount.view.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page);
    }


    public function errorPage($msg){
        parent::errorPage($msg);
//---<> J'ACCEDE A LA CLASSE MERE AVEC LE MOT CLE PARENT (MainController) <>---//
    }
}