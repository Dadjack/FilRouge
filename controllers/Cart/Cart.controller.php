<?php

//---<> SECTION VISITEUR ---<>//

require_once "controllers/MainController.controller.php";
require_once "models/Cart/CartManager.class.php";

class CartController extends MainController{
    private $cartManager;
    private $productManager;
    private $userManager;


    public function __construct(){
        $this->cartManager = new CartManager();
        $this->productManager = new ProductManager();
    }  

    public function showCart(){
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = array();
        }
        $products = $_SESSION['cart'];
        $data_page = [
            "page_description" => "Page du panier",
            "page_title" => "Page du panier",
            "products" => $products,
            "view" => "views/User/cart.view.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page);
        //var_dump($_SESSION['cart']);
        var_dump($products);
        //var_dump($products);
        //unset($_SESSION['alert']);    //---<> C'EST UNE ACTION DE PILOTAGE ON LA MET DANS LE CONTROLEUR <>---//
    }

    public function delProductCart($id){
        $this->cartManager->delProduct($id);
        header('Location: '.URL. "cart/showCart");
    }

    public function delCart($id){
        $this->cartManager->delCart($id);
        header('Location: '.URL. "cart/showCart");
    }
    
    public function addToCart($id){
        if($this->cartManager->addSelectProduct($id)){
            Toolbox::addAlertMessage("Le produit a été ajouté au panier", Toolbox::COULEUR_VERTE);
            header('Location: '.URL. "furnitures");
        } else {
            Toolbox::addAlertMessage("Erreur le produit n'a pas pu être ajouté ", Toolbox::COULEUR_ROUGE);
            header('Location: '.URL. "furnitures");
        }
    }
    
}