<?php
//---<> GESTIONNAIRE DE TOUS LES PRODUITS <>---//
require_once "models/MainManager.class.php";
require_once "Cart.class.php";
//require_once "Cart.function.php";


//---<> ON VA ETENDRE LA CLASSE MODEL <>---//
class CartManager extends MainManager{
        private $carts;  
        private $products; 
        
    public function addCart($cart){
        $this->carts[] = $cart;
    }

    public function getCarts(){
        return $this->carts;
    }

    public function addProduct($product){
        $this->products[] = $product;
    }

    public function getProducts(){
        return $this->products;
    }

    // $_SESSION['profile'] = [
    //     "login" => $login,
    //     "idUser" => $idUser
    // ];

        public function add($id){
        $cart = array(
            "idProduct"=>$id['idProduct'],
            "product_name"=>$id['product_name'],
            "product_image"=>$id['product_image'],
            "product_description"=>$id['product_description'],
            "product_quantity"=>$id['product_quantity'],
            "product_price"=>$id['product_price']
            );
        $_SESSION['cart'][]=$cart;
        //var_dump($cart);
        //var_dump($_SESSION['cart']);
        return $_SESSION['cart'];
    }

    public function delCart(){
        unset($_SESSION['cart']);
    }

    public function delProduct($ref){
        foreach($_SESSION['cart'] as $key => $value){
            if($ref == $value['idProduct']){
                unset($_SESSION['cart'][$key]);
            }
        }
    }

    public function getProduct($id){
        $req = $this->getBdd()->prepare ("SELECT * FROM products WHERE idProduct = :idProduct");
        $req->bindValue(":idProduct",$id,PDO::PARAM_INT);
        $req->execute();
        $result = $req->fetch(PDO::FETCH_ASSOC);
        //var_dump($result);;
        return $result;
        // var_dump($datas);
    }

    public function addSelectProduct($id){
        $req = $this->getBdd()->prepare ("SELECT * FROM products WHERE idProduct = :idProduct");
        $req->bindValue(":idProduct",$id,PDO::PARAM_INT);
        $req->execute();
        $result = $req->fetch(PDO::FETCH_ASSOC);
        //var_dump($result);
        $this->add($result);
        return $result;
    }

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
                            $product['idCategory']);
            $this->addProduct($p);
        }
    }

        //---<> AJOUT DU PRODUIT EN BDD <>---//

        // public function addProductCartBdd($idProduct,$productName,$productImage,$productDescription,$productQuantity,$productPrice,$cartHourDate,$idUser){
        //     // $idCategory = $_POST['idCategory'];  
        //     $idUser = $_SESSION['profile']['idUser'];
        //     // var_dump($idUser);  
        //     $req = "INSERT INTO carts (idProduct, product_name, product_image, product_description, product_quantity, product_price, cart_hour_date, idUser)
        //             VALUES (:product_name, :product_image, :product_description, :product_quantity, :product_price, :cart_hour_date, :idUser)";
        //     $stmt = $this->getBdd()->prepare($req);
        //     $stmt->bindValue(":product_name",$productName,PDO::PARAM_STR);
        //     $stmt->bindValue(":product_image",$productImage,PDO::PARAM_STR);
        //     $stmt->bindValue(":product_description",$productDescription,PDO::PARAM_STR);
        //     $stmt->bindValue(":product_quantity",$productQuantity,PDO::PARAM_INT);
        //     $stmt->bindValue(":product_price",$productPrice,PDO::PARAM_INT);
        //     $stmt->bindValue(":cart_hour_date",$cartHourDate,PDO::PARAM_INT);
        //     $stmt->bindValue(":idUser",$idUser,PDO::PARAM_INT);
        //     $result = $stmt->execute();
        //     $stmt->closeCursor();
        //     var_dump($result);
    
        //     if($result > 0){                      //---<> RETOURNE L'ID DE LA DERNIERE INFORMATION ENVOYE EN BASE DE DONNEE <>---//
        //         $cart = new Cart($this->getBdd()->lastInsertId(),$productName,$productImage,$productDescription,$productQuantity,$productPrice,$cartHourDate,$idUser);
        //         $this->addProduct($cart);//---<> AJOUT DU PRODUIT DANSLE TABLEAU DE PRODUITS <>---//
        //         var_dump($cart);
        //         Toolbox::addAlertMessage("Le produit a été ajouté au panier", Toolbox::COULEUR_VERTE);
        //     } else {
        //         Toolbox::addAlertMessage("Echec de l'ajout au panier", Toolbox::COULEUR_ROUGE);
        //     }
        // }

            // public function updateProductAvailable($idProduct){
    //     $req = "UPDATE products set is_available = 0 WHERE idProduct = idProduct";
    //     $stmt = $this->getBdd()->prepare($req);
    //     $stmt->bindValue(":idProduct",$idProduct,PDO::PARAM_INT);
    //     $stmt->execute();
    //     $isChange = ($stmt->rowCount() > 0);
    //     $stmt->closeCursor();
    //     return $isChange;
    // }

    // public function cancelProductValidation($idProduct){
    //     $req = "UPDATE products set is_available = 1 WHERE idProduct = idProduct";
    //     $stmt = $this->getBdd()->prepare($req);
    //     $stmt->bindValue(":idProduct",$idProduct,PDO::PARAM_INT);
    //     $stmt->execute();
    //     $isChange = ($stmt->rowCount() > 0);
    //     $stmt->closeCursor();
    //     return $isChange;
    // }

// public function addProductCart($cartHourDate){  
//     $idUser = $_SESSION['profile']['idUser'];
//     var_dump($idUser);  
//     $req = "INSERT INTO carts  (cart_hour_date, idUser)
//             VALUES (:cart_hour_date, :idUser)";
//     $stmt = $this->getBdd()->prepare($req);
//     $stmt->bindValue(":cart_hour_date",$cartHourDate,PDO::PARAM_STR);
//     $stmt->bindValue(":idUser",$idUser,PDO::PARAM_INT);
//     $result = $stmt->execute();
//     $stmt->closeCursor();
//     var_dump($result);

//     if($result > 0){                      //---<> RETOURNE L'ID DE LA DERNIERE INFORMATION ENVOYE EN BASE DE DONNEE <>---//
//         $cart = new Cart($this->getBdd()->lastInsertId(),$cartHourDate,$idUser);
//         $this->addCart($cart);//---<> AJOUT DU PRODUIT DANS LE TABLEAU DE PRODUITS <>---//
//         var_dump($cart);
//         Toolbox::addAlertMessage("Ajout du produit au panier", Toolbox::COULEUR_VERTE);
//     } else {
//         Toolbox::addAlertMessage("Echec de l'ajout du produit", Toolbox::COULEUR_ROUGE);
//     }
// }
}