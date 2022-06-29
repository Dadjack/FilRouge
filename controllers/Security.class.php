<?php

abstract class Security {
    public const COOKIE_NAME="timers";

    //---<> EN STATIC POUR QUE CE SOIT ACCESSIBLE DIRECTEMENT DEPUIS LA CLASSE SECURITE <>---//
    public static function secureHTML($chaine){
        return htmlspecialchars(strip_tags(trim(($chaine))));
    }
    public static function isConnect(){
        return (!empty($_SESSION['profile']));
    }

    public static function isUser(){
        return ($_SESSION['profile']['role'] === "user");
    }

    public static function isAdministrator(){
        return ($_SESSION['profile']['role'] === "administrator");
    }

    public static function generateCookieConnexion(){
        //---<> ON GENERE UNE VALEUR POUR LE COOKIE <>---//
        $ticket = session_id().microtime().rand(0,999999);
        //---<> ON CRYPTE CETTE VALEUR <>---//
        $ticket = hash("sha512",$ticket);
        setcookie(self::COOKIE_NAME,$ticket,time()+(60*60));
        $_SESSION['profile'][self::COOKIE_NAME] = $ticket;
    }

    public static function checkCookieConnexion(){
        return $_COOKIE[self::COOKIE_NAME] === $_SESSION['profile'][self::COOKIE_NAME];
    }
}
