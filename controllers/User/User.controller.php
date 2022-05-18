<?php

require_once "controllers/MainController.controller.php";
require_once "models/User/UserManager.class.php";
require_once "models/Address/AddressManager.class.php";

class UserController extends MainController{
    private $userManager;

    public function __construct(){
        $this->userManager = new UserManager();
        $this->addressManager = new AddressManager();

    }

    //---<> VALIDATION DU LOGIN <>---//

    public function validationLogin($login,$password,$idUser){
        if($this->userManager->isValidCombination($login,$password)){
            if($this->userManager->isAccountActive($login)){
                Toolbox::addAlertMessage("Bon retour sur le site " .$login. "!", Toolbox::COULEUR_VERTE);
                $_SESSION['profile'] = [
                    "login" => $login,
                    "idUser" => $idUser
                ];
                Security::generateCookieConnexion();
                header('Location: '.URL."account/profile");
            } else {
                $msg = "Le compte " .$login. " n'a pas été activé par mail. ";
                $msg .= "<a href='renvoyerMailValidation/".$login."'>Renvoyer le mail de validation</a>";
                Toolbox::addAlertMessage($msg, Toolbox::COULEUR_ROUGE);
                //renvoyer le mail de validation
                header('Location: '.URL. "login");
            }
        } else {
            Toolbox::addAlertMessage("Combinaison Login / Mot de passe non valide", Toolbox::COULEUR_ROUGE);
            header('Location: '.URL."login");
        }
    }

    //---<> PROFIL <>---//

    public function profile(){
        $datas = $this->userManager->getUserInformations($_SESSION['profile']['login']);
        $dataAddress = $this->addressManager->getAddressInformations();
        // $dataTown = $this->userManager->getTownInformations($_SESSION['profile']['login']);
        $_SESSION['profile']["role"] = $datas['role'];
        $_SESSION['profile']["idUser"] = $datas['idUser'];
        $data_page = [
            "page_description" => "Page de profil",
            "page_title" => "Page de profil",
            "user" => $datas,
            "address" => $dataAddress,
            // "town" => $dataTown,
            "page_javascript"=> ['profil.js'],
            "view" => "views/User/profile.view.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page);
        //var_dump($datas);
        //var_dump($dataAddress);
    }

    //---<> DECONNEXION <>---//

    public function disconnection(){
        Toolbox::addAlertMessage("Vous êtes maintenant déconnecté", Toolbox::COULEUR_VERTE);
        unset($_SESSION['profile']);
        setCookie(Security::COOKIE_NAME,"",time() - 3600);
        header('Location: '.URL."home");
    }

    //---<> VALIDATION CREATION DU COMPTE <>---//

    public function validationCreateAccount($login,$mail,$password){
        if($this->userManager->checkLoginAvailable($login)){
            $passwordCrypte = password_hash($password, PASSWORD_DEFAULT);
            $clef = rand(0,9999);
            if($this->userManager->createAccountBdd($login,$mail,$passwordCrypte,"user",$clef,"profils/profil.png")){
                $this->sendMailValidation($login,$mail,$clef);
                Toolbox::addAlertMessage("Le compte a été créé, un mail de validation vous a été envoyé !", Toolbox::COULEUR_VERTE);
                header('Location: '.URL. "login");
            } else {
                Toolbox::addAlertMessage("Erreur lors de la création du compte, recommencez !", Toolbox::COULEUR_ROUGE);
                header('Location: '.URL. "createAccount");
            }
        } else {
            Toolbox::addAlertMessage("Le login est déja utilisé !", Toolbox::COULEUR_ROUGE);
            header('Location: '.URL. "createAccount");
        }
    }

    //---<> ENVOI DU MAIL DE VALIDATION <>---//

    private function sendMailValidation($login,$mail,$clef){
        $urlVerification = URL."validationMail/".$login."/".$clef;
        $subject = "Création du compte sur le site xxx";
        $message = "<a href= 'Pour valider votre compte veuillez cliquer sur le lien suivant/" .$urlVerification."'>Valider votre Compte</a>";
        Toolbox::sendMail($mail,$subject,$message);
    }

    //---<> RENVOI DU MAIL DE VALIDATION <>---//

    public function sendBackMailValidation($login){
        $user = $this->userManager->getUserInformations($login);
        $this->sendMailValidation($login,$user['user_mail'],$user['clef']);
        header("Location: ".URL."login");
    }

    //---<> VALIDATION DU MAIL <>---//

    public function validationMailAccount($login,$clef){
        if($this->userManager->validationMailAccountBdd($login,$clef)){
            Toolbox::addAlertMessage("Le compte a été activé !", Toolbox::COULEUR_VERTE);
            header("Location: ".URL."login");
        } else {
            Toolbox::addAlertMessage("Le compte n'a pas été activé !", Toolbox::COULEUR_ROUGE);
            header("Location: ".URL."createAccount");
        }
    }

    //---<> VALIDATION CHANGEMENT DU MAIL <>---//
    
    public function validationChangeMail($mail){
        if($this->userManager->changeUserMailBdd($_SESSION['profile']['login'],$mail)){
            Toolbox::addAlertMessage("La modification est effectuée !", Toolbox::COULEUR_VERTE);
        } else {
            Toolbox::addAlertMessage("Aucune modification effectuée !", Toolbox::COULEUR_ROUGE);
        }
            header("Location: ".URL."account/profile");
    }

    //---<> VALIDATION CHANGEMENT DU NOM <>---//

    public function validationChangeName($name){
        if($this->userManager->changeUserNameBdd($_SESSION['profile']['login'],$name)){
            Toolbox::addAlertMessage("La modification est effectuée !", Toolbox::COULEUR_VERTE);
        } else {
            Toolbox::addAlertMessage("Aucune modification effectuée !", Toolbox::COULEUR_ROUGE);
        }
            header("Location: ".URL."account/profile");
    }

    //---<> VALIDATION CHANGEMENT DU PRENOM <>---//

    public function validationChangeFirstName($firstName){
        if($this->userManager->changeUserFirstNameBdd($_SESSION['profile']['login'],$firstName)){
            Toolbox::addAlertMessage("La modification est effectuée !", Toolbox::COULEUR_VERTE);
        } else {
            Toolbox::addAlertMessage("Aucune modification effectuée !", Toolbox::COULEUR_ROUGE);
        }
            header("Location: ".URL."account/profile");
    }

    //---<> VALIDATION CHANGEMENT DU NUMERO DE TELEPHONE <>---//

    public function validationChangePhone($phone){
        if($this->userManager->changeUserPhoneBdd($_SESSION['profile']['login'],$phone)){
            Toolbox::addAlertMessage("La modification est effectuée !", Toolbox::COULEUR_VERTE);
        } else {
            Toolbox::addAlertMessage("Aucune modification effectuée !", Toolbox::COULEUR_ROUGE);
        }
            header("Location: ".URL."account/profile");
    }

    //---<> CHANGEMENT DU MOT DE PASSE <>---//

    public function changePassword(){
        $data_page = [
            "page_description" => "Modification du mot de passe",
            "page_title" => "Modification du mot de passe",
            "page_javascript"=> ["changePassword.js"],
            "view" => "views/User/changePassword.view.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page);
    }

    //---<> VALIDATION CHANGEMENT DU MOT DE PASSE <>---//

    public function validationChangePassword($oldPass,$newPass,$confirmNewPass){
        if($newPass === $confirmNewPass){
            if($this->userManager->isValidCombination($_SESSION['profile']['login'],$oldPass)){
                $mdpCrypte = password_hash($newPass,PASSWORD_DEFAULT);
                if($this->userManager->changePasswordBdd($_SESSION['profile']['login'],$mdpCrypte)){
                    Toolbox::addAlertMessage("Le mot de passe a été modifié avec succès ", Toolbox::COULEUR_VERTE);
                    header('Location: '.URL. "account/changePassword");
                } else {
                    Toolbox::addAlertMessage("Le mot de passe a été modifié avec succès ", Toolbox::COULEUR_VERTE);
                    header('Location: '.URL. "account/profile");
                }
            }else{
                Toolbox::addAlertMessage("La modification a échouée !", Toolbox::COULEUR_ROUGE);
                header('Location: '.URL. "account/changePassword");
            }
        } else {
            Toolbox::addAlertMessage("Les mots de passe ne correspondent pas !", Toolbox::COULEUR_ROUGE);
            header('Location: '.URL. "account/changePassword");
        }       
    }

    //---<> VALIDATION SUPPRESSION DU COMPTE <>---//
    
    public function validationDeleteAccount(){
        $this->fileDeleteUserImage($_SESSION['profile']['login']);
        rmdir("public/images/profils/".$_SESSION['profile']['login']);
        if($this->userManager->deleteAccountBdd($_SESSION['profile']['login'])) {
            Toolbox::addAlertMessage("La suppression du compte est effectuée", Toolbox::COULEUR_VERTE);
            $this->disconnection();
        } else {
            Toolbox::addAlertMessage("La suppression n'a pas effectuée. Contactez l'administrateur", Toolbox::COULEUR_ROUGE);
            header('Location: '.URL. "compte/profil");
        }
    }

    //---<> VALIDATION CHANGEMENT DE L'IMAGE <>---//

    public function validationChangeImage($file){
        try{
            $directory = "public/images/profils/".$_SESSION['profile']['login']."/";
            $nameImage = Toolbox::addImage($file,$directory);//---<> AJOUT IMAGE DANS LE REPERTOIRE <>---//
            //---<> SUPPRESSION DE L'ANCIENNE IMAGE <>---//
            $this->fileDeleteUserImage($_SESSION['profile']['login']);
            //---<> AJOUT DE LA NOUVELLE IMAGE DANS LA BDD <>---//
            $nameImageBdd = "profils/".$_SESSION['profile']['login']."/".$nameImage;
            if($this->userManager->addImageBdd($_SESSION['profile']['login'],$nameImageBdd )){
                Toolbox::addAlertMessage("La modification de l'image est effectuée", Toolbox::COULEUR_VERTE);
            } else {
                Toolbox::addAlertMessage("La modification de l'image n'a pas été effectuée", Toolbox::COULEUR_ROUGE);
            }
        } catch(Exception $e){
            Toolbox::addAlertMessage($e->getMessage(), Toolbox::COULEUR_ROUGE);
        }    
        header('Location: '.URL. "account/profile");
    }

    //---<> SUPPRESSION DE L'IMAGE DE L'UTILISATEUR <>---//

    private function fileDeleteUserImage(){
        $oldImage = $this->userManager->getUserImage($_SESSION['profile']['login']);
        if($oldImage !== "profils/profil.png"){
            unlink("public/images/".$oldImage);
        }
    }

    //---<> PAGE D'AJOUT AU PANIER <>---//

    // public function addCart(){
    //     $data_page = [
    //         "page_description" => "Page de panier",
    //         "page_title" => "Page de panier",
    //         "view" => "views/User/cart.view.php",
    //         "template" => "views/common/template.php"
    //     ];
    //     $this->generatePage($data_page);
    // }

    //---<> PAGE COMMENTAIRES <>---//

    public function comments(){
        $data_page = [
            "page_description" => "Page de contact",
            "page_title" => "Page de contact",
            "view" => "views/User/comments.view.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page);
    }

    //---<> PAGE DE CONTACT <>---//

    // public function contact(){
    //     $data_page = [
    //         "page_description" => "Page de contact",
    //         "page_title" => "Page de contact",
    //         "view" => "views/User/contact.view.php",
    //         "template" => "views/common/template.php"
    //     ];
    //     $this->generatePage($data_page);
    // }

    public function errorPage($msg){
        parent::errorPage($msg);
    }
}
