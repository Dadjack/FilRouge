<?php
require_once "models/MainManager.class.php";
require_once "User.class.php";
// require_once "Town.class.php";


class UserManager extends MainManager{
    private $users;
    
    //---<> ON RECUPERE LE MOT DE PASSE EN BDD <>---//
    private function getUserPassword($login){
        //---<> ON SECURISE L'INFORMATION TRANSMISE A LA FONCTION AVEC BINDVALUE <>---//
        $req = "SELECT user_password FROM users WHERE user_login = :user_login";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":user_login",$login,PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();//---<> ON INDIQUE ICI QU'ON TERMINE LA REQUÊTE <>---//
        return $result['user_password'];
    }

    public function isValidCombination($login,$password){
        $passwordBdd = $this->getUserPassword($login);
        //---<> ON VERIFIE LA CORRESPONDANCE ENTRE LE PASSWORD CRYPTE ET LE PASSWORD SOUMIS PAR LE FORMULAIRE <>---//
        return password_verify($password,$passwordBdd);
    }

    //---<> ON VERIFIE SI LE COMPTE EST ACTIVE <>---//
    public function isAccountActive($login){
        $req = "SELECT is_valid FROM users WHERE user_login = :user_login";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":user_login",$login,PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        //---<> L'INFORMATION RECUPEREE EN BDD EST UNE CHAINE DE CARACTERE <>---//
        //---<> ON MET INT POUR PRECISER QU'ON VEUT RECUPERER UN ENTIER <>---//
        return ((int)$result['is_valid'] === 1);
    }

    public function getUserInformations($login){
        $req = "SELECT * FROM users WHERE user_login = :user_login";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":user_login",$login,PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $result;
    }

    public function createAccountBdd($login,$mail,$passwordCrypte,$role,$clef,$image){
        $req = "INSERT INTO users (user_login, user_mail, user_password, is_valid, role, clef, image)
        VALUES (:user_login, :user_mail, :user_password, 1, :role, :clef, :image)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":user_login",$login,PDO::PARAM_STR);
        $stmt->bindValue(":user_mail",$mail,PDO::PARAM_STR);
        $stmt->bindValue(":user_password",$passwordCrypte,PDO::PARAM_STR);
        $stmt->bindValue(":role",$role,PDO::PARAM_STR);
        $stmt->bindValue(":clef",$clef,PDO::PARAM_INT);
        $stmt->bindValue(":image",$image,PDO::PARAM_STR);
        $stmt->execute();
        $isChange = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isChange;
    }

    public function checkLoginAvailable($login){
        $visitor = $this->getUserInformations($login);
        return empty($visitor);
    }

    public function validationMailAccountBdd($login,$clef){
        $req = "UPDATE users set is_valid = 1 WHERE user_login = :user_login AND clef = :clef";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":user_login",$login,PDO::PARAM_STR);
        $stmt->bindValue(":clef",$clef,PDO::PARAM_INT);
        $stmt->execute();
        $isChange = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isChange;
    }

    public function changeUserMailBdd($login,$mail){
        $req = "UPDATE users set user_mail = :user_mail WHERE user_login = :user_login";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":user_login",$login,PDO::PARAM_STR);
        $stmt->bindValue(":user_mail",$mail,PDO::PARAM_STR);
        $stmt->execute();
        $isChange = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isChange;
    }

    public function changeUserNameBdd($login,$name){
        $req = "UPDATE users set user_name = :user_name WHERE user_login = :user_login";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":user_login",$login,PDO::PARAM_STR);
        $stmt->bindValue(":user_name",$name,PDO::PARAM_STR);
        $stmt->execute();
        $isChange = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isChange;
    }

    public function changeUserFirstNameBdd($login,$firstName){
        $req = "UPDATE users set user_firstname = :user_firstname WHERE user_login = :user_login";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":user_login",$login,PDO::PARAM_STR);
        $stmt->bindValue(":user_firstname",$firstName,PDO::PARAM_STR);
        $stmt->execute();
        $isChange = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isChange;
    }

    //update t1 inner join t2 on t1.c0 = t2.c0
    //set t1.c1 = 10, t2.c1 = 10;

    public function changeUserPhoneBdd($login,$phone){
        $req = "UPDATE users set user_phone = :user_phone WHERE user_login = :user_login";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":user_login",$login,PDO::PARAM_STR);
        $stmt->bindValue(":user_phone",$phone,PDO::PARAM_STR);
        $stmt->execute();
        $isChange = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isChange;
    }

    public function changePasswordBdd($login,$mdp){
        $req = "UPDATE users set user_password = :user_password WHERE user_login = :user_login";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":user_login",$login,PDO::PARAM_STR);
        $stmt->bindValue(":user_password",$mdp,PDO::PARAM_STR);
        $stmt->execute();
        $isChange = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isChange;
    }

    public function deleteAccountBdd($login){
        $req = "DELETE FROM users WHERE user_login = :user_login";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":user_login",$login,PDO::PARAM_STR);
        $stmt->execute();
        $isChange = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isChange;
    }

    public function addImageBdd($login,$image){
        $req = "UPDATE users set image = :image WHERE user_login = :user_login";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":user_login",$login,PDO::PARAM_STR);
        $stmt->bindValue(":image",$image,PDO::PARAM_STR);
        $stmt->execute();
        $isChange = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isChange;
    }

    public function getUserImage($login){
        $req = "SELECT image FROM users WHERE user_login = :user_login";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":user_login",$login,PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $result['image'];
    }

    public function getUsersInformations(){
        $req = $this->getBdd()->prepare("SELECT idUser, user_login FROM users");
        $req->execute();
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $result;
        //var_dump($result);
    }

    public function getIdUsers(){
        $users = $this->getUsersInformations();
        for($i=0; $i <count($users); $i++){
            // if($users[$i]['idUser']){
                return $users[$i]['idUser'];
            //}
        }
    }
}