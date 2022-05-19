<?php

//---<> ROUTEUR <>---//

session_start();//---<> ON DEMARRE LA SESSION <>---//
//---<> ON DECOMPOSE L'URL <>---//               //---<> CONDITION TERNAIRE POUR TESTER SI ON EST SUR UN SITE EN HTTP OU HTTPS <>--->
define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http").
"://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require_once "controllers/Toolbox.class.php";
require_once "controllers/Security.class.php";
require_once "controllers/Visitor/Visitor.controller.php";
require_once "controllers/User/User.controller.php";
require_once "controllers/Address/Address.controller.php";
require_once "controllers/Town/Town.controller.php";
require_once "controllers/Product/Product.Controller.php";
require_once "controllers/Cart/Cart.Controller.php";
require_once "controllers/Image/Image.Controller.php";
require_once "controllers/Administrator/Administrator.controller.php";
$visitorController = new VisitorController;
$userController = new UserController;
$addressController = new AddressController;
$townController = new TownController;
$productController = new ProductController;
$cartController = new CartController;
$imageController = new ImageController;
$administratorController = new AdministratorController;


try{//---<> JE VERIFIE EST CE QUE J'AI L'INFORMATION $_GET DE PAGE <>---//
    if(empty($_GET['page'])){
        //---<> RACINE DU SITE PAGE ACCUEIL <>---//
        $page = "home";
    } else {
    //---<> CONSTANTE URL <>---//
    //---<> ON EXPLOSE NOTRE URL EN UTILISANT LE CARACTERE "/" SI ON A DES INFORMATIONS DANS L'URL <>---//
            //---<> CECI NOUS PERMETTRA D'ACCEDER A DES SOUS-NIVEAUX (DES SOUS-DOSSIERS) <>---//
        $url = explode("/", filter_var($_GET['page']),FILTER_SANITIZE_URL );
        $page = $url[0];
    }

        switch($page){
            case "home" : $visitorController->home();
            break;
            case "products" : //---<> SECTION VISITEUR <>---//
                if(empty($url[1])) {
                    $productController->showProducts();//---<> AFFICHE TOUS LES PRODUITS <>---//   
                } else if($url[1] === "p") {
                    $productController->showProduct($url[2]);//---<> AFFICHER LE PRODUIT <>---//
                } else {
                    //---ON TRAITE TOUT LES CAS QUI NE SONT PAS PARAMETRES---//
                    throw new Exception ("La page n'existe pas"); 
                }
            break;
            case "furnitures" : //---<> SECTION VISITEUR <>---//
                if(empty($url[1])) {
                    $productController->showProductsFurnitures();//---<> AFFICHE TOUS LES PRODUITS <>---//   
                } else if($url[1] === "p") {
                    $productController->showProduct($url[2]);//---<> AFFICHER LE PRODUIT <>---//
                } else {
                    //---ON TRAITE TOUT LES CAS QUI NE SONT PAS PARAMETRES---//
                    throw new Exception ("La page n'existe pas"); 
                }
            break;
            case "drawings" : //---<> SECTION VISITEUR <>---//
                if(empty($url[1])) {
                    $productController->showProductsDrawings();//---<> AFFICHE TOUS LES PRODUITS <>---//   
                } else if($url[1] === "p") {
                    $productController->showProduct($url[2]);//---<> AFFICHER LE PRODUIT <>---//
                } else {
                    //---ON TRAITE TOUT LES CAS QUI NE SONT PAS PARAMETRES---//
                    throw new Exception ("La page n'existe pas"); 
                }
            break;
            case "peebles" : //---<> SECTION VISITEUR <>---//
                if(empty($url[1])) {
                    $productController->showProductsPeebles();//---<> AFFICHE TOUS LES PRODUITS <>---//   
                } else if($url[1] === "p") {
                    $productController->showProduct($url[2]);//---<> AFFICHER LE PRODUIT <>---//
                } else {
                    //---ON TRAITE TOUT LES CAS QUI NE SONT PAS PARAMETRES---//
                    throw new Exception ("La page n'existe pas"); 
                }
            case "comments" : $userController->comments();
            break;
            case "userProducts" : //---<> SECTION UTILISATEUR <>---//
                if(empty($url[1])){
                    $productController->showUserProducts();//---<> AFFICHER LES PRODUITS UTILISATEUR <>---//
                } else if($url[1] === "up") {
                    $productController->showUserProduct($url[2]);//---<> AFFICHER LE PRODUIT UTILISATEUR <>---//  
                } else if($url[1] === "ap") {
                    $productController->addProduct();//---<> AJOUT D'UN PRODUIT <>---//
                } else if($url[1] === "mp") {
                    $productController->changeProduct($url[2]);//---<> MODIFIER UN PRODUIT <>---//
                } else if($url[1] === "sp") {
                    $productController->deleteProduct($url[2]); //---<> SUPPRIMER UN PRODUIT <>---//                  
                } else if($url[1] === "av") {
                    $productController->addProductValidation();//---<> VALIDATION DU PRODUIT <>---//
                } else if($url[1] === "ai") {
                    $imageController->addImageProduct($url[2]);//---<> AJOUT IMAGES DU PRODUIT <>---//
                } else if($url[1] === "aiv") {
                    $imageController->addImageProductValidation();//---<> VALIDATION AJOUT IMAGES DU PRODUIT <>---//
                } else if($url[1] === "mpv") {
                    $productController->changeProductValidation();//---<> VALIDATION DE LA MODIFICATION DU PRODUIT <>---//
                } else if($url[1] === "c") {
                    if(!empty($url[2])){
                        $cartController->addToCart($url[2]);
                    }
                } else if($url[1] === "d") {
                    if(!empty($url[2])){
                            $cartController->delProductCart($url[2]);
                    }
                } else if($url[1] === "dc") {
                    if(!empty($url[2])){
                            $cartController->delCart($url[2]);
                    }
                } else {
                    throw new Exception ("La page n'existe pas"); 
                }
            break;
            case "cart":
                if(!Security::isConnect()){
                    Toolbox::addAlertMessage("Veuillez vous connecter !", Toolbox::COULEUR_ROUGE);
                    header("Location: ".URL."login");
                } else {
                    switch($url[1]){
                        case "showCart" :
                            if(!Security::isConnect()){
                                Toolbox::addAlertMessage("Veuillez vous connecter !", Toolbox::COULEUR_ROUGE);
                                header("Location: ".URL."login");
                            } else {
                                $cartController->showCart();
                            }
                        break;
                        default : throw new Exception ("La page n'existe pas"); 
                    }
                }
            break;
            case "userAddress" : //---<> SECTION ADRESSE UTILISATEUR <>---//
                if(empty($url[1])){
                    $addressController->addAddress();//---<> AJOUT ADRESSE UTILISATEUR <>---//
                } else if($url[1] === "av") {
                    if(!empty($_POST['street_number']) && !empty($_POST['street_name']) && !empty($_POST['additional_address'])){
                        $streetNumber = Security::secureHTML($_POST['street_number']);
                        $streetName = Security::secureHTML($_POST['street_name']);
                        $additionalAdress = Security::secureHTML($_POST['additional_address']);
                        $addressController->addAddressValidation($streetNumber,$streetName,$additionalAdress);
                    }
                } else {
                    throw new Exception ("La page n'existe pas"); 
                }
            break;
            case "userTown" : //---<> SECTION ADRESSE UTILISATEUR <>---//
                if(empty($url[1])){
                    $townController->addTown();//---<> AJOUT ADRESSE UTILISATEUR <>---//
                } else if($url[1] === "av") {
                    if(!empty($_POST['name_town']) && !empty($_POST['postal_code'])){
                        $nameTown = Security::secureHTML($_POST['name_town']);
                        $postalCode = Security::secureHTML($_POST['postal_code']);;
                        $townController->addTownValidation($nameTown,$postalCode);
                    }
                } else {
                    throw new Exception ("La page n'existe pas"); 
                }
            break;
            case "login" : $visitorController->login();
            break;
            case "validationLogin" :
                if(!empty($_POST['user_login']) && !empty($_POST['user_password'])){
                    $login = Security::secureHTML($_POST['user_login']);
                    $password = Security::secureHTML($_POST['user_password']);
                    // $password_confirm = Security::secureHTML($_POST['user_password_confirm']);
                    // if(($_POST['user_password'] === ($_POST['user_password_confirm'])){
                        $userController->validationLogin($login,$password,$idUser);
                    } else {
                    Toolbox::addAlertMessage("Login ou mot de passe non renseigné", Toolbox::COULEUR_ROUGE);
                    header('Location: '.URL. "login");
                }    
            break;  
            case "createAccount" : $visitorController->createAccount();            
            break;
            case "validationCreateAccount" : 
                if(!empty($_POST['user_login']) && !empty($_POST['user_mail']) && !empty($_POST['user_password'])){
                    $login = Security::secureHTML($_POST['user_login']);
                    $mail = Security::secureHTML($_POST['user_mail']);
                    $password = Security::secureHTML($_POST['user_password']);
                    $userController->validationCreateAccount($login,$mail,$password);
                } else {
                    Toolbox::addAlertMessage("Les 3 informations sont obligatoires !", Toolbox::COULEUR_ROUGE);
                    header('Location: '.URL. "createAccount");
                }
            break;
            case "sendBackMailValidation" : $userController->sendBackMailValidation($url[1]);
            break;
            case "validationMail" : $userController->validationMailAccount($url[1],$url[2]);
            break;
            //---<> CASE ACCOUNT ---<>
            case "account"  :
                if(!Security::isConnect()){
                    Toolbox::addAlertMessage("Veuillez vous connecter !", Toolbox::COULEUR_ROUGE);
                    header('Location: '.URL. "login");
                } elseif(!Security::checkCookieConnexion()){
                    Toolbox::addAlertMessage("Veuillez vous reconnecter !", Toolbox::COULEUR_ROUGE);
                    setcookie(Security::COOKIE_NAME,"",time() - 3600);
                    unset($_SESSION["profile"]);
                    header('Location: '.URL. "login");
                } else {
                    Security::generateCookieConnexion();//---<> REGENERATION DU COOKIE <>---//
                    switch($url[1]){
                        case "profile": $userController->profile();
                        break;
                        case "disconnection": $userController->disconnection();
                        break;
                        case "validationChangeMail" : $userController->validationChangeMail(Security::secureHTML($_POST['user_mail']));
                        break;
                        case "validationChangeName" : $userController->validationChangeName(Security::secureHTML($_POST['user_name']));
                        break;
                        case "validationChangeFirstName" : $userController->validationChangeFirstName(Security::secureHTML($_POST['user_firstname']));
                        break;
                        case "validationChangePhone" : $userController->validationChangePhone(Security::secureHTML($_POST['user_phone']));
                        break;
                        case "changePassword" : $userController->changePassword();
                        break;
                        case "validationChangePassword" : 
                            if(!empty($_POST['oldPass']) && !empty($_POST['newPass']) && !empty($_POST['confirmNewPass'])){
                                $oldPass = Security::secureHTML($_POST['oldPass']);
                                $newPass = Security::secureHTML($_POST['newPass']);
                                $confirmNewPass = Security::secureHTML($_POST['confirmNewPass']);
                                $userController->validationChangePassword($oldPass,$newPass,$confirmNewPass);
                            } else {
                                Toolbox::addAlertMessage("Vous n'avez pas renseigné toutes les informations !", Toolbox::COULEUR_ROUGE);
                                header('Location: '.URL. "account/changePassword");
                            }
                        break;
                        case "deleteAccount" : $userController->validationDeleteAccount();    
                        break;
                        case "validationChangeImage" :
                            if($_FILES['image']['size'] > 0) {
                                $userController->validationChangeImage($_FILES['image']);
                            } else {
                                Toolbox::addAlertMessage("Vous n'avez pas modifié l'image", Toolbox::COULEUR_ROUGE);
                                header('Location: '.URL. "account/profile");
                            }
                        break;
                        default : throw new Exception ("La page n'existe pas");
                    }
                }
            break;
            case "administration" : 
                if(!Security::isConnect()){
                    Toolbox::addAlertMessage("Veuillez vous connecter !", Toolbox::COULEUR_ROUGE);
                    header("Location: ".URL."login");
                } elseif(!Security::isAdministrator()){
                    Toolbox::addAlertMessage("Vous n'avez pas les droits d'accès !", Toolbox::COULEUR_ROUGE);
                    header("Location: ".URL."accueil");
                } else {
                    switch($url[1]){
                        case "rights" : $administratorController->rights();
                        break;
                        case "validationChangeRole" : $administratorController->validationChangeRole($_POST['user_login'],$_POST['role']);
                        break;
                        default : throw new Exception ("La page n'existe pas"); 
                    }
                }
            break;
            default : throw new Exception ("La page n'existe pas"); 
        }
    }
catch(Exception $e){
    $visitorController->errorPage($e->getMessage());
}


