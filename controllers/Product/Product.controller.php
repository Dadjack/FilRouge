<?php

//---<> SECTION VISITEUR ---<>//

require_once "controllers/MainController.controller.php";
require_once "models/Product/ProductManager.class.php";

class ProductController extends MainController{
    private $productManager;
    private $imageManager;
    private $userManager;

    public function __construct(){
        $this->productManager = new ProductManager();
        $this->imageManager = new ImageManager();
        $this->userManager = new UserManager();
    }

    //---<>------------------<>---//
    //---<> SECTION VISITEUR <>---//
    //---<>------------------<>---//

    //---<> VOIR TOUS LES PRODUITS <>---//

    // public function showProducts(){
    //     $this->productManager->loadingProducts();
    //     $products = $this->productManager->getProducts();
    //     $data_page = [
    //         "page_description" => "Page des produits",
    //         "page_title" => "Page des produits",
    //         "products" => $products,
    //         "page_css" => ['products.css'],
    //         "view" => "views/Visitor/products.view.php",
    //         "template" => "views/common/template.php"
    //     ];
    //     $this->generatePage($data_page);
    //     //unset($_SESSION['alert']);//---<> C'EST UNE ACTION DE PILOTAGE ON LA MET DANS LE CONTROLEUR <>---//
    //     var_dump($products);
    // }

    //---<> VOIR UN PRODUIT <>---//
    public function showProduct($id){
        $this->productManager->loadingProducts();
        $product = $this->productManager->getProductById($id);
        $this->imageManager->loadingImages($id);
        $products =  $this->imageManager->getImages();
        $user = $this->getUserLogin($id);
        $data_page = [
            "page_description" => "Page d'un produit",
            "page_title" => "Page d'un produit",
            "product" => $product,
            "products" => $products,
            "user" => $user,
            "page_css" => ['products.css'],
            "view" => "views/Visitor/showProduct.view.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page);
    }

    public function getUserLogin($id){
        $users = $this->userManager->getUsersInformations();
        $products = $this->productManager->getProductsInformations($id);
        for($i=0; $i <count($users); $i++){
            if($users[$i]['idUser'] === $products['idUser']){
                return $users[$i]['user_login'];
            }
        }
    }

    //---<> VOIR TOUS LES MEUBLES <>---//
    public function showProductsFurnitures(){
        $this->productManager->loadingProductsFurnitures();
        $products = $this->productManager->getProducts();
        $data_page = [
            "page_description" => "Page des meubles",
            "page_title" => "Page des meubles",
            "products" => $products,
            "page_css" => ['products.css'],
            "view" => "views/Visitor/furnitures.view.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page);
        //unset($_SESSION['alert']);//---<> C'EST UNE ACTION DE PILOTAGE ON LA MET DANS LE CONTROLEUR <>---//
        var_dump($products);
    }

    //---<> VOIR TOUS LES DESSINS <>---//
    public function showProductsDrawings(){
        $this->productManager->loadingProductsDrawings();
        $products = $this->productManager->getProducts();
        $data_page = [
            "page_description" => "Page des produits",
            "page_title" => "Page des produits",
            "products" => $products,
            "page_css" => ['products.css'],
            "view" => "views/Visitor/drawings.view.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page);
        //unset($_SESSION['alert']);//---<> C'EST UNE ACTION DE PILOTAGE ON LA MET DANS LE CONTROLEUR <>---//
        var_dump($products);
    }

    //---<> VOIR TOUS LES GALETS <>---//
    public function showProductsPeebles(){
        $this->productManager->loadingProductsPeebles();
        $products = $this->productManager->getProducts();
        $data_page = [
            "page_description" => "Page des produits",
            "page_title" => "Page des produits",
            "products" => $products,
            "page_css" => ['products.css'],
            "view" => "views/Visitor/peebles.view.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page);
        //unset($_SESSION['alert']);//---<> C'EST UNE ACTION DE PILOTAGE ON LA MET DANS LE CONTROLEUR <>---//
        var_dump($products);
    }

    //---<>---------------------<>---//
    //---<> SECTION UTILISATEUR <>---//
    //---<>---------------------<>---//

    //---<> VOIR LES PRODUITS DE L'UTILISATEUR <>---//
    public function showUserProducts(){
        $this->productManager->loadingProductsUser();
        $products = $this->productManager->getProducts();
        $data_page = [
            "page_description" => "Page d'un produit",
            "page_title" => "Page d'un produit",
            "products" => $products,
            "page_css" => ['products.css'],
            "view" => "views/User/userProducts.view.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page);
        var_dump($products);
    }

    //---<> VOIR UN PRODUIT <>---//
    public function showUserProduct($id){
        $this->productManager->loadingProducts();
        $product = $this->productManager->getProductById($id);
        $this->imageManager->loadingImages($id);
        $products = $this->imageManager->getImages();
        $data_page = [
            "page_description" => "Page du produit",
            "page_title" => "Page du produit",
            "product" => $product,
            "products" => $products,
            "page_css" => ['products.css'],
            "view" => "views/User/userProduct.view.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page);
        var_dump($product);
    }

    //---<> AJOUTER UN PRODUIT <>---//
    public function addProduct(){
        $data_page = [
            "page_description" => "Page d'ajout de produit",
            "page_title" => "Page d'ajout de produit",
            "view" => "views/User/addProduct.view.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page);
    }

    //---<> VALIDATION D'AJOUT DU PRODUIT <>---//
    public function addProductValidation(){
        $file = $_FILES['product_image'];
        $directory = "public/images/ImgM/";
        $addNameImage = Toolbox::addImage($file, $directory); //---<> UPLOAD DE L'IMAGE <>---//
        $this->productManager->addProductBdd($_POST['product_name'], $addNameImage, $_POST['product_description'], $_POST['product_quantity'], $_POST['product_price'], $_POST['idCategory']);
        header('Location: ' . URL . "account/profile");
    }

    //---<> SUPPRIMER UN PRODUIT <>---//
    public function deleteProduct($id){
        $this->productManager->loadingProducts();
        $nameImage = $this->productManager->getProductById($id)->getProductImage();
        unlink("public/images/" . $nameImage);           //---<> SUPPRESSION DE L'IMAGE <>---//
        $this->productManager->deleteProductBdd($id); //---<> SUPPRESSION EN BDD <>---//       
        header('Location: ' . URL . "userProducts");
    }

    //---<> MODIFIER UN PRODUIT <>---//
    public function changeProduct($id){
        $this->productManager->loadingProducts();
        $product = $this->productManager->getProductById($id);
        $data_page = [
            "page_description" => "Page d'ajout de produit",
            "page_title" => "Page d'ajout de produit",
            "product" => $product,
            "view" => "views/User/changeProduct.view.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page);
    }

    //---<> VALIDATION MODIFICATION DU PRODUIT <>---//
    public function changeProductValidation(){
        $this->productManager->loadingProducts();
    //---<> ON RECUPERE L'IMAGE DU PRODUIT QUE L'ON VEUT MODIFIER <>---//
        $actualImage = $this->productManager->getProductById($_POST['identifiant'])->getProductImage();
        $file = $_FILES['product_image'];
    //---<> ON VERIFIE SI L'UTILISATEUR A RENSEIGNE DANS L'INPUT FILE UNE NOUVELLE IMAGE <>---//
        if ($file['size'] > 0) {
    //---<> SI C'EST LE CAS ON SUPPRIME L'IMAGE QU'IL Y A DANS NOTRE REPERTOIRE POUR Y METTRE LA NOUVELLE <>---//
            unlink("public/images/ImgM/".$actualImage);
            $directory = "public/images/ImgM/";
            $nameImageToAdd = Toolbox::addImage($file, $directory); //---<> UPLOAD DE L'IMAGE <>---//
        } else {
    //---<> SINON ON RECUPERE DANS LA VARIABLE $nomImageToAdd L'IMAGE ACTUELLE <>---//
            $nameImageToAdd = $actualImage;
        }
        $this->productManager->changeProductBdd($_POST['identifiant'], $_POST['product_name'], $nameImageToAdd, $_POST['product_description'], $_POST['product_quantity'], $_POST['product_price']);
        Toolbox::addAlertMessage("La modification a été éffectuée", Toolbox::COULEUR_VERTE);
        header('Location: ' . URL . "userProducts");
    }
}
