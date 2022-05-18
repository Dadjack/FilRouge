<?php

//---<> SECTION VISITEUR ---<>//

require_once "controllers/MainController.controller.php";
require_once "models/Image/ImageManager.class.php";

class ImageController extends MainController{
    private $imageManager;
    private $productManager;

    public function __construct(){
        $this->imageManager = new ImageManager();
        $this->productManager = new ProductManager();
    }

    //---<> AJOUTER UNE IMAGE PRODUIT <>---//
    public function addImageProduct($id){
        $this->productManager->loadingProducts();
        $product = $this->productManager->getProductById($id);
        $data_page = [
            "page_description" => "Page d'ajout d'image du produit",
            "page_title" => "Page d'ajout d'image du produit",
            "product" => $product,
            "view" => "views/User/addImageProduct.view.php",
            "template" => "views/common/template.php",
        ];
            $this->generatePage($data_page);
            var_dump($product);
    }

    // //---<> VOIR LES IMAGES D'UN PRODUIT <>---//
    // public function showImagesProduct(){
    //     $this->imageManager->loadingImages();
    //     //$products = $this->productManager->getProducts();
    //     $products =  $this->imageManager->getImages();
    //     $data_page = [
    //         "page_description" => "Page d'un produit",
    //         "page_title" => "Page d'un produit",
    //         //"product" => $product,
    //         "products" => $products,
    //         //"image" => $image,
    //         "page_css" => ['products.css'],
    //         "view" => "views/User/showImagesProduct.view.php",
    //         "template" => "views/common/template.php"
    //     ];
    //     $this->generatePage($data_page);
    //     //var_dump($product);
    // }
    
    //---<> VALIDATION D'AJOUT DE L'IMAGE <>---//
    public function addImageProductValidation(){
        $idProduct =  $_POST['idProduct'];
        $file = $_FILES['product_image'];
        $directory = "public/images/ImgM/";
        $addNameImage = Toolbox::addImage($file, $directory); //---<> UPLOAD DE L'IMAGE <>---//
        $this->imageManager->addImageBdd($addNameImage,$idProduct);
        header('Location: ' . URL . "userProducts");
        Toolbox::addAlertMessage("L'image a été ajoutée", Toolbox::COULEUR_VERTE);
    }
}