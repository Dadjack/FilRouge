<?php

require_once "controllers/Toolbox.class.php";


//---<> ELLE NE PEUT PAS ETRE INSTANCIEE PAR ELLE MEME / ELLE NE PEUT PAS AVOIR D'OBJETS  <>---//
abstract class MainController {

    //---<> FONCTIONS PERMETTANT D'AFFICHER MES PAGES <>---//

    //---<> PROTECTED QUI NE SOIT ACCESSIBLE QUE PAR LES OBJETS DE CETTE CLASSE ET DE SES ENFANTS <>---// 
    protected function generatePage($data){
        
        //---<> CETTE FONCTION CREER LES VARIABLES DONT LES NOMS SONT LES INDEX DU TABLEAU <>---// 
        //---<> ET LEUR AFFECTE LA VALEUR ASSOCIEE. <>---//
        extract($data);       
        ob_start();
        //---<> Le contenu de la vue va être entre ob_start et ob_get_clean <>---//
        require_once($view);
        $page_content = ob_get_clean();
        require_once($template);
    }

    

    protected function errorPage($msg){
        $data_page = [
            "page_description" => "Page permettant de gérer les erreurs",
            "page_title" => "Page d'erreur",
            "msg" => $msg,
            "view" => "./views/error.view.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page);
    }
}