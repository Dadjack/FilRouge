<?php

require_once "models/MainManager.class.php";

class AdministratorManager extends MainManager{

    public function getUsers(){
        $req = $this->getBdd()->prepare("SELECT * FROM users");
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
    }

    public function validationChangeRoleBdd($login,$role){
        $req = "UPDATE users set role = :role WHERE user_login = :user_login ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":user_login",$login,PDO::PARAM_STR);
        $stmt->bindValue(":role",$role,PDO::PARAM_STR);
        $stmt->execute();
        $isChange = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isChange;
    }
}