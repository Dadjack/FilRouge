<?php
//---<> GESTIONNAIRE DE TOUS LES PRODUITS <>---//
require_once "models/MainManager.class.php";
require_once "Image.class.php";

//---<> ON VA ETENDRE LA CLASSE MODEL <>---//
class ImageManager extends MainManager{
    private $images;  //---<> TABLEAU DES IMAGES <>---//
        
    public function addImage($image){
        $this->images[] = $image;
    }

    public function getImages(){
        return $this->images;
    }

    //---<> AJOUT UNE IMAGE DU PRODUIT EN BDD <>---//
    public function addImageBdd($productImage,$idProduct){
        $req = "INSERT INTO product_images (product_image, idProduct)
                VALUES (:product_image, :idProduct)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":product_image",$productImage,PDO::PARAM_STR);
        $stmt->bindValue(":idProduct",$idProduct,PDO::PARAM_INT);
        $result = $stmt->execute();
        $stmt->closeCursor();
        var_dump($result);

        if($result > 0){                      //---<> RETOURNE L'ID DE LA DERNIERE INFORMATION ENVOYE EN BASE DE DONNEE <>---//
            $image = new Image($this->getBdd()->lastInsertId(),$productImage,$idProduct);
            $this->addImage($image);//---<> AJOUT DU PRODUIT DANS LE TABLEAU DE PRODUITS <>---//
            //var_dump($image);
        }
    }

    //---<> AFFICHER LES IMAGES D'UN PRODUIT <>---//
    public function loadingImages($id){     
        $req = "SELECT * FROM product_images WHERE idProduct = :idProduct";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idProduct",$id,PDO::PARAM_INT);
        $stmt->execute();
        $myImages = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        foreach($myImages as $image){
            $i = new Image($image['idImg'],
                            $image['product_image'],
                            $image['idProduct']);
            $this->addImage($i);
        }
    }
}