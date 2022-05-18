<?php

require_once "models/MainManager.class.php";

class VisitorManager extends MainManager{

    public function getUsers(){
        $req = $this->getBdd()->prepare("SELECT * FROM users");
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
    }

}