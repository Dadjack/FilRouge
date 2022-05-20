<?php
//---<> GESTIONNAIRE DE TOUS LES PRODUITS <>---//
require_once "models/MainManager.class.php";
require_once "Product.class.php";


//---<> ON VA ETENDRE LA CLASSE MODEL <>---//
class ProductManager extends MainManager{
        private $products = array();  //---<> TABLEAU DE PRODUITS <>---//

        
    public function addProduct($product){
        $this->products[] = $product;
    }

    public function getProducts(){
        return $this->products;
    }

    //---<> CHARGEMENT DE TOUS LES PRODUITS <>---//

    public function loadingProducts(){              
        $req = $this->getBdd()->prepare("SELECT * FROM products");
        $req->execute();
        //---<> ON PARCOURS LA VARIABLE mesProduits POUR ACCEDER A TOUT LES PRODUITS <>---//
        $myProducts = $req->fetchAll(PDO::FETCH_ASSOC);//---<> POUR EVITER D'AVOIR DES DOUBLONS <>---//
        //---<> FINALISE NOTRE REQUETE ET LIBERE LES ACCES POUR UNE AUTRE REQUETE <>---//
        $req->closeCursor();
        foreach($myProducts as $product){
            $p = new Product($product['idProduct'],
                            $product['product_name'],
                            $product['product_image'],
                            $product['product_description'],
                            $product['product_quantity'],
                            $product['product_price'],
                            $product['is_available'],
                            $product['idCategory']);
            $this->addProduct($p);
        }
    }

    //---<> CHARGEMENT DES MEUBLES <>---//
    public function loadingProductsFurnitures(){              
        $req = $this->getBdd()->prepare("SELECT * FROM products WHERE idCategory = 1");
        $req->execute();
        $myProducts = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        foreach($myProducts as $product){
            $p = new Product($product['idProduct'],
                            $product['product_name'],
                            $product['product_image'],
                            $product['product_description'],
                            $product['product_quantity'],
                            $product['product_price'],
                            $product['is_available'],
                            $product['idCategory']);
            $this->addProduct($p);
        }
    }

    //---<> CHARGEMENT DES DESSINS <>---//
    public function loadingProductsDrawings(){              
        $req = $this->getBdd()->prepare("SELECT * FROM products WHERE idCategory = 2");
        $req->execute();
        $myProducts = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        foreach($myProducts as $product){
            $p = new Product($product['idProduct'],
                            $product['product_name'],
                            $product['product_image'],
                            $product['product_description'],
                            $product['product_quantity'],
                            $product['product_price'],
                            $product['is_available'],
                            $product['idCategory']);
            $this->addProduct($p);
        }
    }

    //---<> CHARGEMENT DES GALETS <>---//
    public function loadingProductsPeebles(){              
        $req = $this->getBdd()->prepare("SELECT * FROM products WHERE idCategory = 3");
        $req->execute();
        $myProducts = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        foreach($myProducts as $product){
            $p = new Product($product['idProduct'],
                            $product['product_name'],
                            $product['product_image'],
                            $product['product_description'],
                            $product['product_quantity'],
                            $product['product_price'],
                            $product['is_available'],
                            $product['idCategory']);
            $this->addProduct($p);
        }
    }

    // //---<> CHARGEMENT DES AUTRES PRODUITS <>---//

    // public function loadingOtherProducts(){              
    //     $req = $this->getBdd()->prepare("SELECT * FROM products WHERE idCategory = 4");
    //     $req->execute();
    //     $myProducts = $req->fetchAll(PDO::FETCH_ASSOC);
    //     $req->closeCursor();
    //     foreach($myProducts as $product){
    //         $p = new Product($product['idProduct'],
    //                         $product['product_name'],
    //                         $product['product_image'],
    //                         $product['product_description'],
    //                         $product['product_quantity'],
    //                         $product['product_price'],
    //                         $product['idCategory']);
    //         $this->addProduct($p);
    //     }
    // }

    //---<> CHARGEMENT DES PRODUITS UTILISATEURS <>---//
    //$req = $this->getBdd()->prepare("SELECT * FROM products INNER JOIN users ON products.idUser = users.idUser" );
    public function loadingProductsUser(){
        $idUser =  $_SESSION['profile']['idUser'];             
        $req = $this->getBdd()->prepare("SELECT * FROM products WHERE idUser = $idUser" );
        $req->execute();
        $myProducts = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        foreach($myProducts as $product){
            $p = new Product($product['idProduct'],
                            $product['product_name'],
                            $product['product_image'],
                            $product['product_description'],
                            $product['product_quantity'],
                            $product['product_price'],
                            $product['is_available'],
                            $product['idCategory']);
            $this->addProduct($p);
        }
    }
    
    //---<> RECUPERATION D'UN SEUL PRODUIT <>---//

    public function getProductById($id){
        for($i=0; $i < count($this->products); $i++){
            if($this->products[$i]->getIdProduct() === $id){
                return $this->products[$i];
            }
        }
        throw new Exception("Le produit n'existe pas");
    }

    //---<> AJOUT DU PRODUIT EN BDD <>---//

    public function addProductBdd($productName,$productImage,$productDescription,$productQuantity,$productPrice,$idCategory){
        $idCategory = $_POST['idCategory'];  
        $idUser = $_SESSION['profile']['idUser'];
        var_dump($idUser);  
        $req = "INSERT INTO products  (product_name, product_image, product_description, product_quantity, product_price, is_available, idUser, idCategory)
                VALUES (:product_name, :product_image, :product_description, :product_quantity, :product_price, 1, :idUser, :idCategory)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":product_name",$productName,PDO::PARAM_STR);
        $stmt->bindValue(":product_image",$productImage,PDO::PARAM_STR);
        $stmt->bindValue(":product_description",$productDescription,PDO::PARAM_STR);
        $stmt->bindValue(":product_quantity",$productQuantity,PDO::PARAM_INT);
        $stmt->bindValue(":product_price",$productPrice,PDO::PARAM_INT);
        $stmt->bindValue(":idUser",$idUser,PDO::PARAM_INT);
        $stmt->bindValue(":idCategory",$idCategory,PDO::PARAM_INT);
        $result = $stmt->execute();
        $stmt->closeCursor();
        var_dump($result);

        if($result > 0){                      //---<> RETOURNE L'ID DE LA DERNIERE INFORMATION ENVOYE EN BASE DE DONNEE <>---//
            $product = new Product($this->getBdd()->lastInsertId(),$productName,$productImage,$productDescription,$productQuantity,$productPrice,$idUser,$idCategory);
            $this->addProduct($product);//---<> AJOUT DU PRODUIT DANS LE TABLEAU DE PRODUITS <>---//
            var_dump($product);
            Toolbox::addAlertMessage("Le produit a été ajouté", Toolbox::COULEUR_VERTE);
        } else {
            Toolbox::addAlertMessage("Echec de l'ajout du produit", Toolbox::COULEUR_ROUGE);
        }
    }

    //---<> SUPPRESSION DU PRODUIT EN BDD <>---//

    public function deleteProductBdd($id){
        $req = "DELETE FROM products WHERE idProduct = :idProduct";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idProduct",$id,PDO::PARAM_INT);
        $result = $stmt->execute();
        $stmt->closeCursor();
        if($result > 0){
            $product = $this->getProductById($id);
            unset($product);
            Toolbox::addAlertMessage("Le produit a été supprimé", Toolbox::COULEUR_VERTE);
        } else{
            Toolbox::addAlertMessage("Le produit n'a pas pu être supprimé", Toolbox::COULEUR_ROUGE);
        }
    }

    //---<> MODIFICATION DU PRODUIT EN BDD <>---//

    public function changeProductBdd($idProduct,$productName,$productImage,$productDescription,$productQuantity,$productPrice,$isAvailable){
        $req = "UPDATE products 
        SET product_name = :product_name, product_image = :product_image, product_description = :product_description,
        product_quantity = :product_quantity, product_price = :product_price , is_available = :is_available
        WHERE idProduct = :idProduct";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idProduct",$idProduct,PDO::PARAM_INT);
        $stmt->bindValue(":product_name",$productName,PDO::PARAM_STR);
        $stmt->bindValue(":product_image",$productImage,PDO::PARAM_STR);
        $stmt->bindValue(":product_description",$productDescription,PDO::PARAM_STR);
        $stmt->bindValue(":product_quantity",$productQuantity,PDO::PARAM_INT);
        $stmt->bindValue(":product_price",$productPrice,PDO::PARAM_INT);
        $stmt->bindValue(":is_available",$isAvailable,PDO::PARAM_INT);
        $result = $stmt->execute();
        $stmt->closeCursor();
        var_dump($result);
        // if($result > 0){
        //     $this->getProductById($idProduct)->setProductName($productName);
        //     $this->getProductById($idProduct)->setProductImage($productImage);
        //     $this->getProductById($idProduct)->setProductDescription($productDescription);
        //     $this->getProductById($idProduct)->setProductQuantity($productQuantity);
        //     $this->getProductById($idProduct)->setProductPrice($productPrice);
        //     $this->getProductById($idProduct)->setIsAvailable($isAvailable);
        // }
    }
}