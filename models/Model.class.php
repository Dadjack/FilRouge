<?php

//---<> CLASS ABSTRACT NE SERA JAMAIS INSTANCIABLE DIRECTEMENT <>--//
//---<> VA ETRE HERITE DIRECTEMENT DES AUTRES CLASSES <>---//
abstract class Model{
    private static $pdo;

    private static function setBdd(){
        self::$pdo = new PDO("mysql:host=localhost;dbname=fil_rougee;charset=utf8","root","");//---<> DSN CHEMIN D'ACCES <>---//
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    }
    //---<> SE CHARGERA DE SAVOIR SI IL Y A UNE CONNEXION OU NON QUI EXISTE <>---//
    protected function getBdd(){
        //---<> EST CE QUE MON ATTRIBUT STATIC PDO EST VIDE OU NON <>---//
        if(self::$pdo === null){
            self::setBdd();
        }
        return self::$pdo;
    }
}