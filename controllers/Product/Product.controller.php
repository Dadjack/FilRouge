<?php

//---<> SECTION VISITEUR ---<>//

require_once "controllers/MainController.controller.php";
require_once "models/Product/ProductManager.class.php";

class ProductController extends MainController{
    private $productManager;
    private $imageManager;

    public function __construct(){
        $this->productManager = new ProductManager();
        $this->imageManager = new ImageManager();
    }

    //---<>------------------<>---//
    //---<> SECTION VISITEUR <>---//
    //---<>------------------<>---//

    //---<> VOIR TOUS LES PRODUITS <>---//

    public function showProducts(){
        $this->productManager->loadingProducts();
        $products = $this->productManager->getProducts();
        $data_page = [
            "page_description" => "Page des produits",
            "page_title" => "Page des produits",
            "products" => $products,
            "page_css" => ['products.css'],
            "view" => "views/Visitor/products.view.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page);
        //unset($_SESSION['alert']);//---<> C'EST UNE ACTION DE PILOTAGE ON LA MET DANS LE CONTROLEUR <>---//
        var_dump($products);
    }

    //---<> VOIR UN PRODUIT <>---//

    public function showProduct($id){
        $this->productManager->loadingProducts();
        $product = $this->productManager->getProductById($id);
        $data_page = [
            "page_description" => "Page d'un produit",
            "page_title" => "Page d'un produit",
            "product" => $product,
            "page_css" => ['products.css'],
            "view" => "views/Visitor/showProduct.view.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page);
        var_dump($product);
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

    
    //---<> VOIR LES AUTRES PRODUITS <>---//

    // public function showOtherProducts(){
    //     $this->productManager->loadingOtherProducts();
    //     $products = $this->productManager->getProducts();
    //     $data_page = [
    //         "page_description" => "Page des produits",
    //         "page_title" => "Page des produits",
    //         "products" => $products,
    //         "view" => "views/Visitor/peebles.view.php",
    //         "template" => "views/common/template.php"
    //     ];
    //     $this->generatePage($data_page);
    //     //unset($_SESSION['alert']);//---<> C'EST UNE ACTION DE PILOTAGE ON LA MET DANS LE CONTROLEUR <>---//
    //     var_dump($products);
    // }


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
        //echo "test";
            $imageToDelete = $this->productManager->getProductById($_POST['identifiant'])->getProductImage();
            $file = $_FILES['product_image'];
            //echo "test";
            if ($file['size'] > 0) {
                unlink("public/images/ImgM/".$imageToDelete);
                $directory = "public/images/ImgM/";
                $nomImageToChange = Toolbox::addImage($file, $directory); //---<> UPLOAD DE L'IMAGE <>---//
                echo "test";
            } else {
                $nomImageToChange = $imageToDelete; //---<> SI L'UTILISATEUR NE CHANGE PAS L'IMAGE <>---//
            }
            $this->productManager->changeProductBdd($_POST['identifiant'], $_POST['product_name'], $nomImageToChange, $_POST['product_description'], $_POST['product_quantity'], $_POST['product_price'], $_POST['is_available']);
            // echo "test";
            Toolbox::addAlertMessage("La modification a été éffectuée", Toolbox::COULEUR_VERTE);
        header('Location: ' . URL . "userProducts");
    }
}
